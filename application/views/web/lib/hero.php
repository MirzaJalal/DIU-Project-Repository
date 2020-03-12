<link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/owl/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/owl/owl.theme.default.min.css">


<!-- header end -->
<!-- Start hero section-->
<div class="owl-carousel owl-theme">

    <div class="item">
        <img src="https://daffodilvarsity.edu.bd/photos/slider/sqccs.png" style="height: 500px;" alt="">
    </div>

    

    <div class="item">
        <img src="https://daffodilvarsity.edu.bd/photos/slider/transport.png" style="height: 500px;" alt="">
    </div>

    <div class="item">
        <img src="<?php echo base_url(); ?>assets/front/img/bg-img/diu.jpg" style="height: 500px;" alt="">
    </div>


</div>
<!-- End hero section-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/front/css/owl/owl.carousel.min.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin:10,
        autoplaySpeed:true,
        autoplay:true,
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        responsive:{
            0:{
                items:1
            },
            1000:{
                items:3
            },
            1000:{
                items:1
            }
        }
    })
</script>