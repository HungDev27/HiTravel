<template>
  <div class="chatbot-container">
    <!-- Toggle button khi chatbot đóng -->
    <button class="chatbot-toggle" @click="toggleChatbot" v-if="!isOpen">
      💬
    </button>

    <!-- Chatbot popup window -->
    <div class="chatbot-wrapper" v-if="isOpen">
      <div class="chatbot-header">
        <h2>🛫 NHTravel Chatbot</h2>
        <button class="close-btn" @click="closeChatbot">×</button>
      </div>

      <div class="chatbot-messages">
        <div class="messages-list">
          <div
            v-for="message in messages"
            :key="message.id || message.timestamp"
            :class="['message', message.loai_tin_nhan || message.type]"
          >
            <div class="message-content" v-html="formatMessage(message.noi_dung || message.content)">
            </div>
            <div class="message-time">
              {{ formatTime(message.created_at || message.timestamp) }}
            </div>
          </div>
          <div ref="messagesEnd"></div>
        </div>
      </div>

      <div class="chatbot-input-area">
        <input
          v-model="userInput"
          @keyup.enter="sendMessage"
          placeholder="Nhập câu hỏi của bạn..."
          class="message-input"
          :disabled="isLoading"
        />
        <button @click="sendMessage" class="send-btn" :disabled="isLoading">
          <span v-if="!isLoading">Gửi</span>
          <span v-else>Đang gửi...</span>
        </button>
      </div>

      <div class="error-message" v-if="error">
        {{ error }}
        <button @click="error = null">×</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Chatbot',
  data() {
    return {
      isOpen: false,
      userInput: '',
      messages: [],
      isLoading: false,
      error: null,
      userId: null,
      token: null,
      isPublicMode: true // Cho phép người dùng chưa đăng nhập hỏi
    };
  },
  mounted() {
    // Lấy user ID và token từ localStorage nếu có
    this.token = localStorage.getItem('token');
    this.userId = localStorage.getItem('userId');

    // Nếu có token, lấy lịch sử chat
    if (this.token && this.userId) {
      this.isPublicMode = false;
      this.loadChatHistory();
    } else {
      this.isPublicMode = true;
    }
  },
  methods: {
    toggleChatbot() {
      this.isOpen = !this.isOpen;
      if (this.isOpen) {
        this.$nextTick(() => {
          this.scrollToBottom();
        });
      }
    },
    closeChatbot() {
      this.isOpen = false;
    },
    async sendMessage() {
      if (!this.userInput.trim()) return;

      // Thêm tin nhắn của người dùng vào danh sách
      this.messages.push({
        noi_dung: this.userInput,
        loai_tin_nhan: 'user',
        created_at: new Date().toISOString(),
        timestamp: new Date().toISOString()
      });

      const message = this.userInput;
      this.userInput = '';
      this.isLoading = true;
      this.error = null;

      try {
        let response;
        const apiUrl = 'http://localhost:8000/api';

        if (this.isPublicMode) {
          // Gọi endpoint public
          response = await fetch(`${apiUrl}/chatbot/ask`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ question: message })
          });

          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
          }

          const data = await response.json();
          
          if (!data.success) {
            throw new Error(data.error || 'Lỗi từ server');
          }

          this.messages.push({
            noi_dung: data.answer,
            loai_tin_nhan: 'bot',
            created_at: new Date().toISOString(),
            timestamp: new Date().toISOString()
          });
        } else {
          // Gọi endpoint protected
          response = await fetch(`${apiUrl}/chatbot/send-message`, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': `Bearer ${this.token}`
            },
            body: JSON.stringify({
              id_khach_hang: this.userId,
              noi_dung: message
            })
          });

          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
          }

          const data = await response.json();
          
          if (!data.success) {
            throw new Error(data.error || 'Lỗi từ server');
          }

          this.messages.push({
            noi_dung: data.message,
            loai_tin_nhan: 'bot',
            created_at: new Date().toISOString(),
            timestamp: new Date().toISOString()
          });
        }

        this.$nextTick(() => {
          this.scrollToBottom();
        });
      } catch (err) {
        const errorMsg = err.message || 'Có lỗi xảy ra. Vui lòng thử lại.';
        this.error = errorMsg;
        console.error('Chatbot Error:', err);

        // Thêm tin nhắn lỗi
        this.messages.push({
          noi_dung: 'Xin lỗi, có lỗi xảy ra. Vui lòng thử lại.',
          loai_tin_nhan: 'error',
          created_at: new Date().toISOString(),
          timestamp: new Date().toISOString()
        });
      } finally {
        this.isLoading = false;
      }
    },
    async loadChatHistory() {
      try {
        const apiUrl = 'http://localhost:8000/api';
        const response = await fetch(
          `${apiUrl}/chatbot/history/${this.userId}`,
          {
            headers: {
              'Authorization': `Bearer ${this.token}`
            }
          }
        );

        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();
        if (data.success) {
          this.messages = data.data;
          this.$nextTick(() => {
            this.scrollToBottom();
          });
        }
      } catch (err) {
        console.error('Error loading chat history:', err);
      }
    },
    scrollToBottom() {
      if (this.$refs.messagesEnd) {
        this.$refs.messagesEnd.scrollIntoView({ behavior: 'smooth' });
      }
    },
    formatTime(timestamp) {
      if (!timestamp) return '';
      const date = new Date(timestamp);
      return date.toLocaleTimeString('vi-VN', {
        hour: '2-digit',
        minute: '2-digit'
      });
    },
    formatMessage(text) {
      if (!text) return '';
      
      // Xóa các dấu * làm bold/italic
      let formatted = text.replace(/\*\*/g, '').replace(/\*/g, '');
      
      // Chuyển đổi markdown lists thành HTML
      // ** ...* thành <li>...</li>
      formatted = formatted.replace(/^\s*\*\s+/gm, '<li>').replace(/^\s*-\s+/gm, '<li>');
      
      // Bọc các <li> trong <ul>
      if (formatted.includes('<li>')) {
        formatted = formatted.replace(/(<li>.*?<\/li>)/gs, '<ul>$1</ul>');
        // Loại bỏ các </ul><ul> thừa
        formatted = formatted.replace(/<\/ul><ul>/g, '');
      }
      
      // Chuyển xuống dòng thành <br>
      formatted = formatted.replace(/\n/g, '<br/>');
      
      // Xóa bỏ các ** thừa
      formatted = formatted.replace(/\*{2,}/g, '');
      
      return formatted;
    },
    clearHistory() {
      if (!this.isPublicMode && confirm('Bạn có chắc chắn muốn xóa lịch sử chat?')) {
        const apiUrl = 'http://localhost:8000/api';
        fetch(`${apiUrl}/chatbot/clear-history/${this.userId}`, {
          method: 'DELETE',
          headers: {
            'Authorization': `Bearer ${this.token}`
          }
        })
          .then(r => r.json())
          .then(data => {
            if (data.success) {
              this.messages = [];
            }
          })
          .catch(err => {
            this.error = 'Lỗi khi xóa lịch sử';
            console.error(err);
          });
      }
    }
  }
};
</script>

<style scoped>
.chatbot-container {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 1000;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen,
    Ubuntu, Cantarell, sans-serif;
}

.chatbot-header {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  padding: 16px;
  border-radius: 12px 12px 0 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 0;
}

.chatbot-toggle {
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border: none;
  font-size: 28px;
  cursor: pointer;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9998;
}

.chatbot-toggle:hover {
  transform: scale(1.1);
  box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
}

.chatbot-wrapper {
  position: fixed;
  bottom: 80px;
  right: 20px;
  width: 400px;
  border-radius: 12px;
  box-shadow: 0 5px 40px rgba(0, 0, 0, 0.16);
  background: white;
  display: flex;
  flex-direction: column;
  z-index: 9999;
  animation: slideUp 0.3s ease;
}

.chatbot-header h2 {
  margin: 0;
  font-size: 18px;
  font-weight: 600;
}

.close-btn {
  background: none;
  border: none;
  color: white;
  font-size: 24px;
  cursor: pointer;
  padding: 0;
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 0.2s;
}

.close-btn:hover {
  transform: scale(1.2);
}

.chatbot-messages {
  width: 100%;
  height: 500px;
  background: white;
  border: none;
  border-radius: 0;
  display: flex;
  flex-direction: column;
  box-shadow: none;
}

.messages-list {
  flex: 1;
  overflow-y: auto;
  padding: 16px;
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.message {
  display: flex;
  flex-direction: column;
  gap: 4px;
  max-width: 85%;
  animation: slideIn 0.3s ease;
}

.message.user {
  align-self: flex-end;
  margin-left: auto;
}

.message.bot {
  align-self: flex-start;
}

.message.error {
  align-self: flex-start;
}

.message-content {
  padding: 12px 16px;
  border-radius: 12px;
  word-wrap: break-word;
  line-height: 1.4;
  font-size: 14px;
}

.message-content ul {
  margin: 8px 0;
  padding-left: 24px;
}

.message-content li {
  margin: 4px 0;
}

.message-content br {
  display: block;
  content: '';
  margin: 4px 0;
}

.message.user .message-content {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border-radius: 18px 18px 4px 18px;
}

.message.bot .message-content {
  background: #f0f0f0;
  color: #333;
  border-radius: 18px 18px 18px 4px;
}

.message.error .message-content {
  background: #ffebee;
  color: #c62828;
  border-radius: 18px 18px 18px 4px;
}

.message-time {
  font-size: 12px;
  color: #999;
  padding: 0 8px;
}

.message.user .message-time {
  text-align: right;
}

@keyframes slideIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.chatbot-input-area {
  display: flex;
  gap: 8px;
  padding: 12px;
  background: white;
  border-top: 1px solid #e0e0e0;
  border-radius: 0 0 12px 12px;
}

.message-input {
  flex: 1;
  border: 1px solid #ddd;
  border-radius: 24px;
  padding: 10px 16px;
  font-size: 14px;
  outline: none;
  transition: border-color 0.3s;
}

.message-input:focus {
  border-color: #667eea;
}

.message-input:disabled {
  background: #f5f5f5;
  cursor: not-allowed;
}

.send-btn {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  border: none;
  border-radius: 24px;
  padding: 10px 24px;
  cursor: pointer;
  font-weight: 600;
  transition: all 0.3s;
  font-size: 14px;
}

.send-btn:hover:not(:disabled) {
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
}

.send-btn:disabled {
  opacity: 0.6;
  cursor: not-allowed;
}

.error-message {
  background: #ffebee;
  color: #c62828;
  padding: 12px 16px;
  border-radius: 8px;
  margin-top: 8px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 14px;
  animation: slideIn 0.3s ease;
}

.error-message button {
  background: none;
  border: none;
  color: #c62828;
  cursor: pointer;
  font-size: 18px;
  padding: 0;
  width: 24px;
  height: 24px;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Scrollbar Styling */
.messages-list::-webkit-scrollbar {
  width: 6px;
}

.messages-list::-webkit-scrollbar-track {
  background: #f1f1f1;
  border-radius: 3px;
}

.messages-list::-webkit-scrollbar-thumb {
  background: #888;
  border-radius: 3px;
}

.messages-list::-webkit-scrollbar-thumb:hover {
  background: #555;
}

/* Responsive */
@media (max-width: 600px) {
  .chatbot-wrapper {
    width: 100vw;
    height: 60vh;
    border-radius: 12px 12px 0 0;
    bottom: 0;
    right: 0;
    left: 0;
  }

  .chatbot-messages {
    width: 100%;
  }

  .chatbot-toggle {
    width: 45px;
    height: 45px;
    font-size: 24px;
  }
}
</style>
