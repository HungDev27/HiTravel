<template>
  <section class="bus-card">
    <!-- Title -->
    <header class="bus-title">
      <img src="../../assets/images/homecustomer/bus_lane.png" alt="" />
      <h2>Tìm Chuyến Xe</h2>
    </header>

    <!-- Form -->
    <div class="bus-form">
      <!-- From -->
      <div class="bus-field">
        <label class="bus-label">Chọn điểm đi <span>*</span></label>
        <select v-model="from" class="bus-input">
          <option value="">-- Chọn điểm đi --</option>
          <option>Hà Nội</option>
          <option>Hồ Chí Minh</option>
          <option>Đà Nẵng</option>
          <option>Nha Trang</option>
          <option>Huế</option>
          <option>Quy Nhơn</option>
          <option>Phú Quốc</option>
        </select>
      </div>

      <!-- Swap -->
      <div class="bus-center">
        <button type="button"
                class="bus-swap"
                :class="{ rot: rotated }"
                @click="swap()"
                aria-label="Đổi điểm đi/đến">
          <img src="../../assets/images/homecustomer/exchange.png" class="icon" alt="" />
        </button>
      </div>

      <!-- To -->
      <div class="bus-field">
        <label class="bus-label">Chọn điểm đến <span>*</span></label>
        <select v-model="to" class="bus-input">
          <option value="">-- Chọn điểm đến --</option>
          <option>Hà Nội</option>
          <option>Hồ Chí Minh</option>
          <option>Đà Nẵng</option>
          <option>Nha Trang</option>
          <option>Huế</option>
          <option>Quy Nhơn</option>
          <option>Phú Quốc</option>
        </select>
      </div>

      <!-- Date go -->
      <div class="bus-field">
        <label class="bus-label">Chọn ngày đi <span>*</span></label>
        <input v-model="dateGo" type="date" class="bus-input" :min="today" />
      </div>

      <!-- Round trip + date back -->
      <div class="bus-field">
        <label class="bus-label">
          <input type="checkbox" v-model="roundTrip" class="me-1" />
          <strong>Khứ hồi</strong>
        </label>
        <input v-model="dateBack"
               type="date"
               class="bus-input"
               :min="dateGo || today"
               :disabled="!roundTrip" />
      </div>

      <!-- Seats -->
      <div class="bus-field">
        <label class="bus-label">Số ghế <span>*</span></label>
        <input v-model.number="seats" type="number" min="1" class="bus-input" />
      </div>

      <!-- Search button -->
      <div class="bus-actions">
        <button class="bus-btn" type="button" @click="submit">
          <img src="../../assets/images/homecustomer/magnifier.png" alt="" />
          Tìm kiếm
        </button>
      </div>
    </div>

    <!-- Suggestion chips -->
    <div class="bus-suggest">
      <div class="bus-suggest-title">Gợi ý nhanh:</div>
      <button class="bus-chip" @click="apply('Hồ Chí Minh','Đà Lạt')">Hồ Chí Minh - Đà Lạt</button>
      <button class="bus-chip" @click="apply('Hồ Chí Minh','Cần Thơ')">Hồ Chí Minh - Cần Thơ</button>
      <button class="bus-chip" @click="apply('Hồ Chí Minh','Đà Nẵng')">Hồ Chí Minh - Đà Nẵng</button>
      <button class="bus-chip" @click="apply('Hồ Chí Minh','Nha Trang')">Hồ Chí Minh - Nha Trang</button>
    </div>
  </section>
</template>

<script>
export default {
  name: 'BusSearch',
  data() {
    const today = new Date().toISOString().slice(0, 10);
    return {
      from: '', to: '',
      dateGo: '', dateBack: '',
      roundTrip: false, seats: 1,
      rotated: false,
      today
    };
  },
  methods: {
    swap() {
      [this.from, this.to] = [this.to, this.from];
      this.rotated = !this.rotated; // xoay 180°
    },
    apply(f, t) {
      this.from = f; this.to = t;
    },
    submit() {
      if (!this.from || !this.to || !this.dateGo || this.seats < 1) {
        alert('Vui lòng nhập điểm đi, điểm đến, ngày đi và số ghế.');
        return;
      }
      const payload = {
        from: this.from,
        to: this.to,
        dateGo: this.dateGo,
        dateBack: this.roundTrip ? this.dateBack : null,
        seats: this.seats
      };
      console.log('BUS SEARCH:', payload);
      alert('Đã ghi log payload ở console. Gắn API tại đây.');
    }
  }
};
</script>

<style scoped>
/* Card */
.bus-card{
  background:#fff;
  border:1px solid rgba(0,0,0,.06);
  border-radius:18px;
  padding:22px 22px 18px;
  box-shadow:0 16px 40px rgba(0,0,0,.08);
}

/* Title */
.bus-title{
  display:flex; align-items:center; gap:14px;
  justify-content:center; margin-bottom:12px;
}
.bus-title img{ width:58px; height:auto; }
.bus-title h2{
  margin:0; font-weight:800;
  letter-spacing:.2px;
}

/* Grid */
.bus-form{
  display:grid;
  grid-template-columns: repeat(12,1fr);
  gap:14px;
  align-items:end;
}
.bus-field{ grid-column: span 3; }
.bus-center{ grid-column: span 1; display:flex; justify-content:center; }
.bus-actions{ grid-column: 10 / -1; display:flex; justify-content:flex-end; }

@media(max-width: 1199.98px){
  .bus-field{ grid-column: span 6; }
  .bus-center{ grid-column: span 12; order:-1; }
  .bus-actions{ grid-column: span 12; }
}

/* Inputs */
.bus-label{ font-weight:700; margin-bottom:6px; display:block; }
.bus-label span{ color:#e83b3b; }
.bus-input{
  width:100%; border-radius:12px;
  border:1px solid rgba(0,0,0,.14);
  padding:11px 12px; outline:0; background:#fff;
  transition: box-shadow .2s, border-color .2s;
}
.bus-input:focus{
  border-color:#9db8ff;
  box-shadow:0 0 0 3px rgba(37,99,235,.15);
}

/* Swap */
.bus-swap{
  width:56px; height:56px; border:0; border-radius:16px;
  background: linear-gradient(180deg,#6c8bf7,#77a6fb);
  box-shadow:0 18px 38px rgba(76,118,240,.25);
  display:grid; place-items:center; cursor:pointer;
  transition: transform .15s ease;
}
.bus-swap:hover{ transform: translateY(-1px); }
.bus-swap .icon{ width:24px;height:24px; transition: transform .28s ease; transform-origin:center; }
.bus-swap.rot .icon{ transform: rotate(180deg); }

/* Button */
.bus-btn{
  display:inline-flex; align-items:center; gap:10px;
  border:0; color:#fff; font-weight:800;
  padding:12px 22px; border-radius:30px; cursor:pointer;
  background-image: linear-gradient(135deg,#4a6ad3 0%,#8caae9 48%,#c1f5fe 100%);
  background-size:200% 200%;
  box-shadow:0 12px 26px rgba(37,99,235,.28);
  transition: background-position .35s ease, transform .15s ease, box-shadow .15s ease;
}
.bus-btn:hover{ background-position:100% 0; transform: translateY(-1px); }
.bus-btn img{ width:18px;height:18px; filter: brightness(0) invert(1); }

/* Suggest */
.bus-suggest{ margin-top:16px; display:flex; align-items:center; gap:10px; flex-wrap:wrap; }
.bus-suggest-title{ font-weight:700; opacity:.85; margin-right:6px; }
.bus-chip{
  padding:8px 14px; border-radius:999px; cursor:pointer;
  border:1px solid #dfe6ff; background:#f3f7ff; font-weight:600; color:#0b57d0;
  transition:.18s;
}
.bus-chip:hover{ background:#e7f0ff; }
</style>
