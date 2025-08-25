<template>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    </head>
    <div>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://bizweb.dktcdn.net/100/295/221/themes/894730/assets/slider_2.jpg?1753157779024"
                        class="d-block w-100" style="height: 400px;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://bizweb.dktcdn.net/100/295/221/themes/894730/assets/slider_2.jpg?1753157779024"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://bizweb.dktcdn.net/100/295/221/themes/894730/assets/slider_2.jpg?1753157779024"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container">
            <div class="card mt-4 border border-primary mb-3">
                <div class="card-body">
                    <div class="d-flex flex-row mb-3">
                        <div class="p-2"><img src="../../assets/images/homecustomer/search-history.png" alt=""></div>
                        <div class="p-2">
                            <h3 class="text-primary"><b>Điểm đến xem gần đây</b></h3>
                        </div>
                    </div>
                    <div class="position-relative">
                         <i class="bi bi-geo-alt position-absolute fa-2x" style="top:50%; left:10px; transform:translateY(-50%); color:#007bff;"></i>
                        <input type="text" class="form-control ps-5" placeholder="Bạn muốn đi đâu?">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Chọn điểm đi:</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</template>
<script>

export default {

}
</script>
<style></style>