<main>
    <!--? slider Area Start-->
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Khóa học</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Trang chủ</a></li>
                                        <li class="breadcrumb-item"><a href="#">Khóa học</a></li>
                                    </ol>
                                </nav>
                                <!-- breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Tất cả khóa học</h2>
                    </div>
                </div>
            </div>
            <div class='mb-5 d-flex justify-content-between align-items-center'>
                <button class="p-3 px-4 ml-4  bg-primary border-0 rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <i class="fa-solid fa-filter"></i>
                </button>
                <form class="gap-2" method="post" action='<?= LESSONS?>'>
                    <div class="d-flex">
                        <input id="filter" name='input_search' class="px-3 rounded border-light py-2 me-2" type="search" placeholder="Tìm khóa học" aria-label="Search">
                        <div>
                            <button name='search_btn' class="p-3 rounded  border-0 bg-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                    <div id="show_course" class="position-absolute w-25 bg-white" style="z-index: 9999">

                    </div>
                </form>
            </div>
            <div class="offcanvas offcanvas-start bg-secondary bg-gradient" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header p-4">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                        <a href="home"><img src="assets/img/img_site/img/logo/logo.png" alt=""></a>
                    </h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <li class="mb-5">
                    <hr class='dropdown-divider'/>
                </li>
                <div class="offcanvas-body">
                    <ul class='gap-5 row ml-3'>
                        <li><a href="<?= LESSONS ?>">Tất cả</a></li>
                        <?php foreach($categories as $value):?>
                            <li class="<?= $value['id'] == 1 ? 'd-none' : '' ?>"><a href="<?= LESSONS ?>?cate=<?php echo $value['id']?>"><?php echo $value['name_category']?></a></li>
                        <?php endforeach?>
                    </ul>
                </div>
            </div>
            <div class="row">
                <?php foreach ($lessions as $value):?>
                    <div class="col-lg-4">
                        <div class="properties properties2 mb-30">
                            <div class="properties__card">
                                <div class="properties__img overlay1">
                                    <a href="<?= LESSONS?>/<?php echo $value['id']?>"><img src="<?= BASE_URL ?>assets/uploads/courses/<?php echo $value['image_course']?>" alt=""></a>
                                </div>
                                <div class="properties__caption">
<!--                                    <p>User Experience</p>-->
                                    <h3><a href="<?= LESSONS?>/<?php echo $value['id']?>"><?php echo $value['name_course']?></a></h3>
                                    <p>
                                        <?php echo $value['description_course'] ?>
                                    </p>
                                    <div class="properties__footer d-flex justify-content-between align-items-center">
                                        <div class="restaurant-name">
                                            <div class="rating">
                                                <?= $avg_rate = empty(get_avg_rate_course($value['id'])) ? 0 : get_avg_rate_course($value['id']); ?>&nbsp;<i class="fas fa-star"></i>
                                            </div>
<!--                                            <p><span>(--><?//= $avg_rate = empty(get_avg_rate_course($value['id'])) ? 0 : get_avg_rate_course($value['id']); ?><!--)</span></p>-->
                                        </div>
                                        <div class="price">
                                            <span><?= total($value['price_course'],$value['discount']) ?></span>
                                            <span class="d-none <?php echo $value['discount'] != 0 ? 'text-decoration-line-through textPrice colorOldPrice' : '' ?>"><?php echo number_format($value['price_course'])?></span>
                                            <span class="d-none"><?php echo $value['discount'] != 0 ? total($value['price_course'],$value['discount']) : '' ?></span>
                                        </div>
                                    </div>
                                    <a href="<?= LESSONS ?>/<?php echo $value['id']?>" class="border-btn border-btn2">Tìm hiểu thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
<!--            <div class="paginationn">-->
<!--                --><?php //pagination($data_cate[1], $data_cate[2], LESSONS); ?>
<!--            </div>-->
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.querySelector('#filter').addEventListener('input', (e) => filterData(e.target.value))
    function filterData(search) {
        axios
            .get("api/courses", {
                params: {
                    q: search.toLowerCase()
                }
            })
            .then((res) => {
                // if(res){
                //     console.log(res)
                // }
                var results = res.data
                document.querySelector('#show_course').innerHTML = ""
                if(results.error){
                    console.log(results.error)
                }
                else {
                    if(results.message){
                        document.querySelector('#show_course').innerHTML = ""
                    }
                    else {
                        results.forEach((items) => {
                            document.querySelector('#show_course').innerHTML += `
                                 <div class="product d-flex justify-content-start align-items-center m-2">
                                    <a href="<?= LESSONS?>/${items.id}">
                                        <img id="image_course" src="assets/uploads/courses/${items.image_course}" width="50px" height="50px" alt="Image Course" style="border-radius: 5px">
                                    </a>
                                    <div class="product-detail d-flex flex-column" style="margin-left: 10px">
                                        <a href="<?= LESSONS?>/${items.id}">
                                            <span id="name_course" style='color:black'>${items.name_course.slice(0, 30)}</span>
                                        </a>
                                        <span id="price_course">${ new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(items.price_course)}</span>
                                    </div>
                                </div>
                               `
                        })
                    }
                }
            })
            .catch((error) => {
                console.error(error);
            });
    }
</script>
<style>

    .paginationn {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .paginationn a,
    .paginationn span
    {
        margin: 2px;
        padding: 10px;
        /*border: 1px solid black;*/
        color: #000;
        border-radius: 20px;
        transition: 0.5s all;
    }
    .paginationn a:hover,
    .paginationn span.active {
        background: cadetblue;
        color: #fff;
    }
</style>