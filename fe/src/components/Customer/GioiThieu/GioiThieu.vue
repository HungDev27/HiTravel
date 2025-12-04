<template>
  <div class="about-page" style="font-family: inherit;">

    <!-- Banner mở đầu -->
    <section style="height:100vh; position:relative; overflow:hidden;">
      <img src="https://sakos.vn/wp-content/uploads/2024/09/thumb-3.jpg" alt="Phong cảnh du lịch Việt Nam"
        style="width:100%; height:100%; object-fit:cover; filter:brightness(55%); display:block;" />
      <div
        style="position:absolute; top:0; left:0; width:100%; height:100%; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; color:white; padding:0 1rem;">
        <h1 class="animate fade-in-up"
          style="opacity:0; transform:translateY(30px); transition: all 0.8s ease; font-size:clamp(2rem, 4vw, 3.6rem); font-weight:800; text-shadow: 0 6px 18px rgba(0,0,0,0.6); margin:0;">
          Khám phá Việt Nam cùng NH Travel
        </h1>
        <p class="animate fade-in-up delay-1"
          style="opacity:0; transform:translateY(30px); transition: all 0.8s ease; transition-delay:0.2s; font-size:clamp(1rem, 2vw, 1.4rem); margin-top:10px; font-weight:600; background:linear-gradient(90deg,#FFD700,#FF4500); -webkit-background-clip:text; -webkit-text-fill-color:transparent;">
          Trải nghiệm vẻ đẹp thiên nhiên, văn hóa và con người Việt Nam
        </p>
        <a href="#intro" class="btn-cta animate fade-in-up delay-2"
          style="opacity:0; transform:translateY(30px); transition: all 0.8s ease; transition-delay:0.4s; margin-top:20px; padding:12px 28px; border:2px solid rgba(255,255,255,0.85); color:white; font-weight:600; text-decoration:none; border-radius:50px; display:inline-block;"
          onmouseover="this.style.background='rgba(255,255,255,0.9)'; this.style.color='#333';"
          onmouseout="this.style.background=''; this.style.color='white';">
          Tìm hiểu thêm
        </a>
      </div>
      <div class="wave"
        style="position:absolute; bottom:0; left:0; width:100%; height:80px; background:url('https://www.svgrepo.com/show/284915/wave.svg') repeat-x; background-size:contain;">
      </div>
    </section>

    <!-- Giới thiệu công ty -->
    <section id="intro" class="container section animate fade-in-up"
      style="padding:60px 20px; max-width:1100px; margin:0 auto; box-sizing:border-box; opacity:0; transform:translateY(30px); transition: all 0.8s ease;">
      <h2 style="text-align:center; font-size:2rem; margin-bottom:25px; color:#2c3e50;">Giới thiệu về NH Travel</h2>
      <p style="font-size:1.1rem; line-height:1.6; margin-bottom:15px; color:#333;">
        NH Travel được thành lập với mục tiêu chính là mang lại sự hài lòng và niềm vui cho khách hàng bằng cách mang
        đến cho họ dịch vụ tốt nhất với giá cả tốt nhất. Các chuyến tham quan bao gồm các chuyến đi trong ngày chọn lọc,
        khách sạn, du ngoạn trên biển, đưa đón và hướng dẫn viên hiếu khách đến những điểm tham quan tốt nhất. Chúng tôi
        có thể tùy chỉnh các chuyến tham quan trọn gói để phù hợp với túi tiền của khách hàng. Chúng tôi muốn cho bạn
        thấy vẻ đẹp tự nhiên tuyệt vời của Việt Nam . Việt Nam là cuộc sống của chúng ta; chúng ta đang sống và hít thở
        nền văn hóa, truyền thống và tín ngưỡng mỗi giây phút mỗi ngày. Chúng tôi rất tự hào về sự vĩ đại của quê hương
        và chúng tôi rất hân hạnh được cho bạn thấy tất cả những gì chúng tôi yêu thích về nó.
      </p>
      <p style="font-size:1.1rem; line-height:1.6; margin-bottom:15px; color:#333;">
        NH Travel giúp bạn tiết kiệm thời gian quý báu và cung cấp cho bạn những chuyến du lịch trọn gói với chất lượng
        cao.Chúng tôi có một đội ngũ hướng dẫn viên tận tâm có thể nói tiếng Anh, Pháp, Tây Ban Nha, Nga, Nhật, Trung và
        các ngôn ngữ khác. Sự chuyên nghiệp, cá tính và kiến thức vượt trội của họ là lý do họ được tuyển dụng bởi chúng
        tôi. Chúng tôi sẽ cố gắng hết sức để làm cho ngày lễ của bạn trở nên đáng nhớ.
      </p>
    </section>

    <!-- Tầm nhìn – Sứ mệnh – Quy trình -->
    <section class="container section vision animate fade-in-up"
      style="padding:60px 20px; max-width:1100px; margin:0 auto; box-sizing:border-box; opacity:0; transform:translateY(30px); transition: all 0.8s ease;">
      <h2 style="text-align:center; font-size:2rem; margin-bottom:25px; color:#2c3e50;">Tầm nhìn – Sứ mệnh – Quy trình
        chuyên môn hóa</h2>
      <div style="display:flex; gap:20px; flex-wrap:wrap; justify-content:center;">
        <div class="card animate fade-in-up delay-1"
          style="opacity:0; transform:translateY(30px); transition: all 0.8s ease; transition-delay:0.2s; background:#f9f9f9; border-radius:12px; padding:20px; flex:1; min-width:250px; box-shadow:0 4px 10px rgba(0,0,0,0.1); text-align:center;">
          <h3 style="margin:0 0 8px 0;">🌏 Tầm nhìn</h3>
          <p style="margin:0;">Trở thành đơn vị lữ hành hàng đầu tại Việt Nam, mang trải nghiệm du
            lịch chất lượng cao đến mọi khách hàng.</p>
        </div>
        <div class="card animate fade-in-up delay-2"
          style="opacity:0; transform:translateY(30px); transition: all 0.8s ease; transition-delay:0.4s; background:#f9f9f9; border-radius:12px; padding:20px; flex:1; min-width:250px; box-shadow:0 4px 10px rgba(0,0,0,0.1); text-align:center;">
          <h3 style="margin:0 0 8px 0;">🎯 Sứ mệnh</h3>
          <p style="margin:0;">Mang đến những chuyến đi ý nghĩa, kết nối văn hóa – thiên nhiên và
            nâng tầm dịch vụ du lịch.</p>
        </div>
        <div class="card animate fade-in-up delay-3"
          style="opacity:0; transform:translateY(30px); transition: all 0.8s ease; transition-delay:0.6s; background:#f9f9f9; border-radius:12px; padding:20px; flex:1; min-width:250px; box-shadow:0 4px 10px rgba(0,0,0,0.1); text-align:center;">
          <h3 style="margin:0 0 8px 0;">⚙️ Quy trình</h3>
          <p style="margin:0;">Chuyên môn hóa từ khâu tư vấn, thiết kế tour, phục vụ và chăm sóc sau
            chuyến đi.</p>
        </div>
      </div>
    </section>

    <!-- Đội ngũ nhân sự -->
    <section class="container section team animate fade-in-up"
      style="padding:60px 20px; max-width:1100px; margin:0 auto; box-sizing:border-box; opacity:0; transform:translateY(30px); transition: all 0.8s ease;">
      <h2 style="text-align:center; font-size:2rem; margin-bottom:25px; color:#2c3e50;">Đội ngũ nhân sự</h2>
      <p style="font-size:1.1rem; line-height:1.6; color:#333;">
        Với đội ngũ hơn 100 nhân sự trẻ trung, năng động và nhiệt huyết, NHTravel hiện đã xuất hiện tại khắp mọi miền
        Tổ quốc, trên các tính thành như: Hà Nội, thành phố Hồ Chí Minh, Đà Nẵng, Tuyên Quang, Thanh Hóa, Bắc Ninh,
        Quảng Ninh và Bắc Kạn. Không chỉ dừng lại ở đó, HiTravel đang tiếp tục mở rộng các đại lý bán nhằm tạo điều kiện
        thuận lợi nhất cho khách hàng trong giao dịch và tư vấn các dịch vụ, tour tuyến một cách tốt nhất và chu đáo
        nhất. Chất lượng dịch vụ là tiêu chuẩn được chúng tôi đặt lên hàng đầu để phục vụ khách tốt nhất. Chúng tôi hiểu
        rằng, mỗi chuyến đi du khách đều mong được gửi gắm vào đó những niềm vui, trải nghiệm, khám phá miền đất mới,
        kiến thức mới đồng thời lưu giữ những bức hình đẹp. Bởi vậy sứ mệnh đặt ra đối với chúng tôi chính là mang đến
        cho mỗi hành trình những dịch vụ đạt chuẩn, những khám phá mới nhất cho từng du khách và luôn là "sự lựa chọn
        tin cậy" cho khách hàng như khẩu hiệu của HiTravel.
      </p>
      <p style="font-size:1.1rem; line-height:1.6; color:#333;">Chất lượng dịch vụ luôn là tiêu chuẩn hàng đầu. Mỗi hành
        trình đều được
        thiết kế để mang đến niềm vui, trải nghiệm và ký ức đáng nhớ cho du khách.</p>

      <div class="team-images"
        style="display:grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap:15px; margin-top:20px;">
        <img
          src="https://toquoc.mediacdn.vn/280518851207290880/2024/4/26/co-nen-hoc-huong-dan-vien-du-lich-20230320021641-e-1714099591931-17140995931381767398991.jpg"
          alt="team1" style="width:100%; height:200px; object-fit:cover; border-radius:12px; display:block;" />
        <img
          src="https://myquynhon.com/upload_images/images/2022/07/11/z3548368656097_74ce13de86e3b21c808459af799f68fa.jpg"
          alt="team2" style="width:100%; height:200px; object-fit:cover; border-radius:12px; display:block;" />
        <img src="https://amis.misa.vn/wp-content/uploads/2024/02/Lu-hanh-SAIGONTOURIST.jpg" alt="team3"
          style="width:100%; height:200px; object-fit:cover; border-radius:12px; display:block;" />
        <img
          src="https://bcp.cdnchinhphu.vn/334894974524682240/2024/6/3/tuyen-dung-va-xay-dung-doi-ngu-nhan-su-gioi-chuyen-mon-cao-1717393124066535404412.jpg"
          alt="team4" style="width:100%; height:200px; object-fit:cover; border-radius:12px; display:block;" />
      </div>
    </section>

    <!-- Lợi ích khi chọn -->
    <section class="container section benefits animate fade-in-up"
      style="padding:60px 20px; max-width:1100px; margin:0 auto; box-sizing:border-box; opacity:0; transform:translateY(30px); transition: all 0.8s ease;">
      <h2 style="text-align:center; font-size:2rem; margin-bottom:25px; color:#2c3e50;">Lợi ích khi chọn NH Travel</h2>
      <ul style="max-width:700px; margin:0 auto; list-style:none; padding:0; color:#333; font-size:1.1rem;">
        <li style="margin:10px 0;">✅ Dịch vụ chất lượng, giá cả hợp lý</li>
        <li style="margin:10px 0;">✅ Đội ngũ hướng dẫn viên tận tâm, chuyên nghiệp</li>
        <li style="margin:10px 0;">✅ Tour đa dạng, linh hoạt, phù hợp nhu cầu</li>
        <li style="margin:10px 0;">✅ Hỗ trợ khách hàng 24/7</li>
      </ul>
    </section>

    <!-- Hình ảnh hoạt động -->
    <section class="container section gallery animate fade-in-up"
      style="padding:60px 20px; max-width:1100px; margin:0 auto; box-sizing:border-box; opacity:0; transform:translateY(30px); transition: all 0.8s ease;">
      <h2 style="text-align:center; font-size:2rem; margin-bottom:8px; color:#2c3e50;">Hình ảnh hoạt động du lịch</h2>
      <p style="text-align:center; font-size:1.2rem; margin-bottom:25px; color:#666;">
        Những khoảnh khắc tuyệt vời cùng NH Travel – Khám phá, trải nghiệm và tận hưởng trọn vẹn!
      </p>

      <div class="gallery-grid"
        style="display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:20px;">
        <!-- Gallery item 1 -->
        <div class="gallery-item"
          style="position:relative; overflow:hidden; border-radius:15px; box-shadow:0 6px 15px rgba(0,0,0,0.2); cursor:pointer; transition: transform 0.4s ease;"
          onmouseover="this.querySelector('img').style.transform='scale(1.1)'; this.querySelector('.overlay').style.opacity='1';"
          onmouseout="this.querySelector('img').style.transform='scale(1)'; this.querySelector('.overlay').style.opacity='0';">
          <img
            src="https://ik.imagekit.io/tvlk/blog/2022/06/bi-kip-du-lich-nha-trang-6.jpg?tr=q-70,c-at_max,w-500,h-300,dpr-2"
            alt="Nha Trang"
            style="width:100%; height:250px; object-fit:cover; transition: transform 0.4s ease; display:block;" />
          <div class="overlay"
            style="position:absolute; top:0; left:0; width:100%; height:100%; background:linear-gradient(to top right, rgba(255,0,150,0.7), rgba(0,204,255,0.7)); display:flex; flex-direction:column; justify-content:center; align-items:center; opacity:0; color:white; text-align:center; padding:15px; transition: opacity 0.4s ease;">
            <h3 style="font-size:1.5rem; margin-bottom:8px;">Tour biển Nha Trang</h3>
            <p style="font-size:1rem;">Thả mình vào làn nước trong xanh và bãi cát trắng</p>
          </div>
        </div>

        <!-- Gallery item 2 -->
        <div class="gallery-item"
          style="position:relative; overflow:hidden; border-radius:15px; box-shadow:0 6px 15px rgba(0,0,0,0.2); cursor:pointer; transition: transform 0.4s ease;"
          onmouseover="this.querySelector('img').style.transform='scale(1.1)'; this.querySelector('.overlay').style.opacity='1';"
          onmouseout="this.querySelector('img').style.transform='scale(1)'; this.querySelector('.overlay').style.opacity='0';">
          <img
            src="https://xehanoisapa.com/wp-content/uploads/2020/02/du-lich-sapa-can-chuan-bi-nhung-gi-3-1024x634.jpg"
            alt="Sapa"
            style="width:100%; height:250px; object-fit:cover; transition: transform 0.4s ease; display:block;" />
          <div class="overlay"
            style="position:absolute; top:0; left:0; width:100%; height:100%; background:linear-gradient(to top right, rgba(255,0,150,0.7), rgba(0,204,255,0.7)); display:flex; flex-direction:column; justify-content:center; align-items:center; opacity:0; color:white; text-align:center; padding:15px; transition: opacity 0.4s ease;">
            <h3 style="font-size:1.5rem; margin-bottom:8px;">Khám phá Sapa</h3>
            <p style="font-size:1rem;">Hành trình qua ruộng bậc thang và văn hóa vùng cao</p>
          </div>
        </div>

        <!-- Gallery item 3 -->
        <div class="gallery-item"
          style="position:relative; overflow:hidden; border-radius:15px; box-shadow:0 6px 15px rgba(0,0,0,0.2); cursor:pointer; transition: transform 0.4s ease;"
          onmouseover="this.querySelector('img').style.transform='scale(1.1)'; this.querySelector('.overlay').style.opacity='1';"
          onmouseout="this.querySelector('img').style.transform='scale(1)'; this.querySelector('.overlay').style.opacity='0';">
          <img src="https://statics.vinpearl.com/kinh-nghiem-du-lich-ha-long-2_1674039281.jpg" alt="Hạ Long"
            style="width:100%; height:250px; object-fit:cover; transition: transform 0.4s ease; display:block;" />
          <div class="overlay"
            style="position:absolute; top:0; left:0; width:100%; height:100%; background:linear-gradient(to top right, rgba(255,0,150,0.7), rgba(0,204,255,0.7)); display:flex; flex-direction:column; justify-content:center; align-items:center; opacity:0; color:white; text-align:center; padding:15px; transition: opacity 0.4s ease;">
            <h3 style="font-size:1.5rem; margin-bottom:8px;">Du ngoạn Hạ Long</h3>
            <p style="font-size:1rem;">Kỳ quan thiên nhiên thế giới trên sóng nước</p>
          </div>
        </div>

        <!-- Gallery item 4 -->
        <div class="gallery-item"
          style="position:relative; overflow:hidden; border-radius:15px; box-shadow:0 6px 15px rgba(0,0,0,0.2); cursor:pointer; transition: transform 0.4s ease;"
          onmouseover="this.querySelector('img').style.transform='scale(1.1)'; this.querySelector('.overlay').style.opacity='1';"
          onmouseout="this.querySelector('img').style.transform='scale(1)'; this.querySelector('.overlay').style.opacity='0';">
          <img src="https://static.vinwonders.com/production/5g8r8oiC-com-ga-hue-8.jpg" alt="Hội An"
            style="width:100%; height:250px; object-fit:cover; transition: transform 0.4s ease; display:block;" />
          <div class="overlay"
            style="position:absolute; top:0; left:0; width:100%; height:100%; background:linear-gradient(to top right, rgba(255,0,150,0.7), rgba(0,204,255,0.7)); display:flex; flex-direction:column; justify-content:center; align-items:center; opacity:0; color:white; text-align:center; padding:15px; transition: opacity 0.4s ease;">
            <h3 style="font-size:1.5rem; margin-bottom:8px;">Phố cổ Hội An</h3>
            <p style="font-size:1rem;">Không gian cổ kính, lung linh đèn lồng</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Cảm nhận khách hàng -->
    <section class="container section testimonials animate fade-in-up"
      style="padding:60px 20px; max-width:1100px; margin:0 auto; box-sizing:border-box; opacity:0; transform:translateY(30px); transition: all 0.8s ease;">
      <h2 style="text-align:center; font-size:2rem; margin-bottom:25px; color:#2c3e50;">Cảm nhận khách hàng</h2>
      <div class="testimonial-grid"
        style="display:grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap:20px; margin-top:20px;">
        <div class="testimonial-card"
          style="background: linear-gradient(135deg, #f6d365 0%, #fda085 100%); color:white; border-radius:15px; padding:20px; box-shadow:0 6px 15px rgba(0,0,0,0.15); transition: transform 0.3s;"
          onmouseover="this.style.transform='translateY(-5px)';" onmouseout="this.style.transform='translateY(0)';">
          <p style="font-style:italic; margin:0 0 12px 0;">"Một chuyến đi tuyệt vời! Hướng dẫn viên rất nhiệt tình và
            thân thiện. Gia đình tôi đã có những kỷ niệm đáng nhớ ở Hạ Long."</p>
          <h4 style="margin:0;">- Chị Lan, Hà Nội</h4>
        </div>

        <div class="testimonial-card"
          style="background: linear-gradient(135deg, #f6d365 0%, #fda085 100%); color:white; border-radius:15px; padding:20px; box-shadow:0 6px 15px rgba(0,0,0,0.15); transition: transform 0.3s;"
          onmouseover="this.style.transform='translateY(-5px)';" onmouseout="this.style.transform='translateY(0)';">
          <p style="font-style:italic; margin:0 0 12px 0;">"NH Travel đã giúp chúng tôi tiết kiệm rất nhiều thời gian
            trong việc lên kế hoạch. Tour Hội An thật sự ấn tượng!"</p>
          <h4 style="margin:0;">- Anh Minh, TP. Hồ Chí Minh</h4>
        </div>

        <div class="testimonial-card"
          style="background: linear-gradient(135deg, #f6d365 0%, #fda085 100%); color:white; border-radius:15px; padding:20px; box-shadow:0 6px 15px rgba(0,0,0,0.15); transition: transform 0.3s;"
          onmouseover="this.style.transform='translateY(-5px)';" onmouseout="this.style.transform='translateY(0)';">
          <p style="font-style:italic; margin:0 0 12px 0;">"Dịch vụ chuyên nghiệp, giá cả hợp lý. Tôi chắc chắn sẽ quay
            lại và đặt thêm tour mới."</p>
          <h4 style="margin:0;">- Maria, Tây Ban Nha</h4>
        </div>
      </div>
    </section>

    <!-- Giá trị cốt lõi -->
    <section class="container section core-values animate fade-in-up"
      style="padding:60px 20px; max-width:1100px; margin:0 auto; box-sizing:border-box; opacity:0; transform:translateY(30px); transition: all 0.8s ease;">
      <h2 style="text-align:center; font-size:2rem; margin-bottom:25px; color:#2c3e50;">Giá trị cốt lõi</h2>
      <div class="values-grid"
        style="display:grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap:25px; margin-top:30px;">
        <div class="value-card"
          style="background:#ffffff; border-radius:18px; padding:25px 20px; text-align:center; box-shadow:0 6px 16px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;"
          onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 12px 20px rgba(0,0,0,0.2)';"
          onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 16px rgba(0,0,0,0.1)';">
          <div class="icon" style="font-size:2.5rem; margin-bottom:12px;">🤝</div>
          <h3 style="margin-bottom:10px; color:#2c3e50;">Tận tâm</h3>
          <p style="margin:0;">Chúng tôi luôn đặt khách hàng làm trung tâm trong mọi hoạt động.</p>
        </div>

        <div class="value-card"
          style="background:#ffffff; border-radius:18px; padding:25px 20px; text-align:center; box-shadow:0 6px 16px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;"
          onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 12px 20px rgba(0,0,0,0.2)';"
          onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 16px rgba(0,0,0,0.1)';">
          <div class="icon" style="font-size:2.5rem; margin-bottom:12px;">🌟</div>
          <h3 style="margin-bottom:10px; color:#2c3e50;">Uy tín</h3>
          <p style="margin:0;">Luôn giữ chữ tín và cam kết mang lại dịch vụ chất lượng cao.</p>
        </div>

        <div class="value-card"
          style="background:#ffffff; border-radius:18px; padding:25px 20px; text-align:center; box-shadow:0 6px 16px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;"
          onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 12px 20px rgba(0,0,0,0.2)';"
          onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 16px rgba(0,0,0,0.1)';">
          <div class="icon" style="font-size:2.5rem; margin-bottom:12px;">🚀</div>
          <h3 style="margin-bottom:10px; color:#2c3e50;">Sáng tạo</h3>
          <p style="margin:0;">Không ngừng đổi mới để mang đến những hành trình độc đáo.</p>
        </div>

        <div class="value-card"
          style="background:#ffffff; border-radius:18px; padding:25px 20px; text-align:center; box-shadow:0 6px 16px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;"
          onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 12px 20px rgba(0,0,0,0.2)';"
          onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 16px rgba(0,0,0,0.1)';">
          <div class="icon" style="font-size:2.5rem; margin-bottom:12px;">🌱</div>
          <h3 style="margin-bottom:10px; color:#2c3e50;">Bền vững</h3>
          <p style="margin:0;">Phát triển du lịch gắn liền với bảo vệ môi trường và văn hóa.</p>
        </div>
      </div>
    </section>

    <!-- Video giới thiệu -->
    <section class="container section video-section animate fade-in-up"
      style="padding:60px 20px; max-width:1100px; margin:0 auto 40px auto; box-sizing:border-box; opacity:0; transform:translateY(30px); transition: all 0.8s ease;">
      <h2 style="text-align:center; font-size:2rem; margin-bottom:15px; color:#2c3e50;">Video giới thiệu về NH Travel
      </h2>
      <p style="text-align:center; font-size:1.2rem; margin-bottom:25px; color:#666;">Khám phá hành trình của chúng tôi
        qua video ngắn dưới đây.</p>

      <div class="video-wrapper"
        style="max-width:800px; margin:0 auto; border-radius:15px; overflow:hidden; box-shadow:0 8px 18px rgba(0,0,0,0.2);">
        <iframe width="100%" height="480" src="https://www.youtube.com/embed/Scxs7L0vhZ4" title="NH Travel Video"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen style="display:block;"></iframe>
      </div>
    </section>

    <!-- CTA cuối trang -->
    <section class="cta-section animate fade-in-up"
      style="text-align:center; padding:80px 20px; background:linear-gradient(135deg, #ff9a9e, #fad0c4); color:white; opacity:0; transform:translateY(30px); transition: all 0.8s ease;">
      <h2 style="font-size:2.2rem; margin-bottom:15px;">Hãy bắt đầu hành trình của bạn cùng NH Travel!</h2>
      <p style="font-size:1.2rem; margin-bottom:25px;">Liên hệ ngay để nhận tư vấn miễn phí và ưu đãi đặc biệt.</p>
      <a href="/lien-he" class="btn-cta"
        style="display:inline-block; padding:12px 28px; border-radius:12px; background:rgba(255,255,255,0.2); color:white; text-decoration:none; font-weight:600;"
        onmouseover="this.style.background='rgba(255,255,255,0.9)'; this.style.color='#333';"
        onmouseout="this.style.background='rgba(255,255,255,0.2)'; this.style.color='white';">
        Liên hệ với chúng tôi
      </a>
    </section>

  </div>
</template>

<script>
export default {
  name: "AboutPage",
  mounted() {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            // set inline styles to show element (replace .animate.visible behavior)
            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
          }
        });
      },
      { threshold: 0.1 }
    );
    document.querySelectorAll(".animate").forEach((el) => observer.observe(el));
  },
};
</script>
