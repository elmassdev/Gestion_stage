<?php $__env->startSection('content'); ?>
<style>
    .cards{
  /* font-family: 'Poppins', sans-serif; */
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
  font-size: 20px;
  max-width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  flex-flow: wrap;
}

.B:hover,.Y:hover, .B a:hover, .Y a:hover{
  transform: scale(1.05);
  transition: all 0.6s ease;
  color:#ffa500 !important;
}

.B,.Y{

    /* background-color: #e67700;*/
    /* background-image: url('/images/wood.jpg');
    background-size: cover;
    background-position: center; */
    font-family: Nunito;
    background-color: rgb(167, 113, 63);
    background-image: url("https://www.transparenttextures.com/patterns/clean-gray-paper.png");
    font-display:auto;
    font-weight: 400;
    font-size: 16px;
    width: 26rem;
    max-width: 80%;
    min-width: 45%;
    box-sizing: border-box;
    margin-bottom: 1rem;
    padding: 1rem;
    color: #ffffff;
}

.B a , .Y a{
  color: #ffffff !important;
  font-size: 1.2rem;

}

ul{
  list-style-type: none;
}

.B, .Y{
  box-shadow: 10px 10px 5px grey;

}


.title{
  text-align: center;
  font-size: 25px;
  color: olivedrab;
  padding: 5px 0px;
}

.sitename{
  background: #81858a;
  color: #fff;
  padding: 4px 10px;
  margin-bottom: 40px;
  font-size: 18px;
}
label{
  text-align: left;
}
</style>

<div class="py-4">
    <p class="title"> Pour plus d'information:</p>
        <div class="cards col-md-6 mx-auto">

            <div class=" card B">
                <span class="sitename">Section des stages: Benguerir</span>
                <ul>
                    <li>
                        <i class="fas fa-mobile-alt mx-2"></i>
                        <a href="tel:+212662077439">+212662077439</a>
                    </li>
                    <li>
                        <i class="far fa-envelope mx-2"></i>
                        <a href="mailto:DeveloppementRHBenguerir@ocpgroup.ma">DeveloppementRHBG@ocpgroup.ma</a>
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt mx-2"></i>
                        <a href="https://goo.gl/maps/Nmb8g6nUSnhb9BUVA" target="_blank">CCI, Benguerir</a>
                    </li>
                </ul>
            </div>


            <div class=" card Y">
                <span class="sitename">Section des stages: Youssoufia</span>
                <ul>
                    <li>
                        <i class="fas fa-mobile-alt mx-2"></i> <a href="tel:+212666050185">+212666050185</a>
                    </li>
                    <li>
                        <i class="far fa-envelope mx-2"></i> <a href="mailto:stageyfia@ocpgroup.ma">stageyfia@ocpgroup.ma</a>
                    </li>
                    <li>
                        <i class="fas fa-map-marker-alt mx-2"></i> <a href="https://maps.app.goo.gl/aoz5aQNNytU6MqUV6" target="_blank">CCI, Youssoufia</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>







<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/contact.blade.php ENDPATH**/ ?>