<template>
    <div class="container mt-2">

        <!-- Tiêu đề -->
        <div class="row" style="margin-inline-end: 200px;">
            <span style="color: #0066CC; font-size: 33px;"><b>Tour Nhật Bản 5N5Đ: HCM - Osaka - Kyoto - Tokyo - Thung
                    Lũng Korankei Mùa Thu</b></span>
        </div>
        <div class="mt-2" title="Click để xem đánh giá">
            <a class="nav-link text-black" style="font-size: 17px;" href="#scrollspyHeading5"><span
                    style="font-size: 13px;" class="badge text-bg-success">10.0</span>
                <span class="ms-2 text-success"><b>Xem</b>
                    <span class="ms-2 text-black">2 đánh giá <i class="fa-solid fa-caret-down"></i></span>
                </span></a>
        </div>

        <div class="row mt-2">
            <div class="col-lg-8">

                <!-- Hình ảnh -->
                <div class="position-relative">

                    <div id="carouselExampleIndicators" class="carousel slide" style="height: 450px; width: 850px;">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner" style="height: 450px; width: 850px;">
                            <div class="carousel-item active">
                                <img src="https://i.pinimg.com/736x/af/4c/0e/af4c0ed2bc3c3a96db69bde76fc22513.jpg"
                                    class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://i.pinimg.com/1200x/fd/94/a3/fd94a3ac5b23ff04af2dbd57b55701af.jpg"
                                    class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://i.pinimg.com/736x/93/7a/d0/937ad0232cb7f9e3b68e9b23ada32c7a.jpg"
                                    class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="position-absolute top-0 start-0 translate-middle"
                        style="background:#d32f2f; color:white; font-weight:bold; padding:6px 15px; font-size:14px; border-radius:2px; margin-left: 132px; margin-top: 50px;">
                        Giảm 4 Triệu Nhóm 4 | 34.899k/khách
                        <!-- Tam giác bên trái -->
                        <div style="position:absolute; left:0; bottom:-8px;
                width:0; height:0;
                border-left:10px solid transparent;
                border-top:8px solid #a62828;"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card" style="background-color: #FFF4E0;">
                    <div class="card-body">
                        <div class="row">
                            <h5 style="color: #0066CC;">Lịch Trình và Giá Tour</h5>
                            <p>Chọn Lịch Trình và Xem Giá:</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>




        <!-- Thanh tab -->
        <nav id="navbar-example2" class="navbar bg-body-tertiary px-3 mb-3"
            style="position:fixed;top:0;left:0px;width:100%;z-index:1000; background-color: antiquewhite;">
            <ul class="nav nav-pills justify-content-center" style="padding-left: 90px;">
                <li class="nav-item">
                    <a class="nav-link text-black" style="font-size: 17px;" href="#scrollspyHeading1">Tổng quan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" style="font-size: 17px;" href="#scrollspyHeading2">Chương trình
                        tour</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" style="font-size: 17px;" href="#scrollspyHeading3">Lịch khởi hành</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" style="font-size: 17px;" href="#scrollspyHeading4">Thông tin cần lưu
                        ý</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" style="font-size: 17px;" href="#scrollspyHeading5">Đánh giá của khách
                        hàng</a>
                </li>
            </ul>
        </nav>

        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
            data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
            <h4 id="scrollspyHeading1">Trải nghiệm thú vị trong tour</h4>
            <p>...</p>
            <h4 id="scrollspyHeading2">Chương trình tour</h4>
            <p>...</p>
            <h4 id="scrollspyHeading3">Lịch khởi hành & giá tour</h4>
            <p>...</p>
            <h4 id="scrollspyHeading4">Thông tin cần lưu ý</h4>
            <p>...</p>
            <h4 id="scrollspyHeading5">Đánh giá khách hàng về</h4>
            <p>...</p>
        </div>
    </div>
</template>
<script>
export default {

}


</script>
<style></style>