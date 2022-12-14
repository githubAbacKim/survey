<style>
    .scale-div {
        border-radius: 2em;
        background-color: white;
    }
    div{
        border: solid 1px;
    }
</style>
<div class="container-fluid p-3">
    <!-- header -->
    <div class="row p-3 justify-content-evenly">
        <div class="col-lg-2 col-xs-12 p-3 text-center">
            <h5 class="fw-bold mt-4">AI 도시를 부탁해!</h5>
        </div>
        <div class="col-lg-6 col-xs-12 p-3">
            <div class="p-2 bd-highlight"><a class="btn btn-secondary btn-sm shadow p-2 btn-bg  m-2" href="#" role="button">테스트</a></div>
            <div class="p-2 bd-highlight"><a class="btn btn-secondary btn-sm shadow p-2 btn-bg  m-2" href="#" role="button">테스트</a></div>
            <div class="p-2 bd-highlight"><a class="btn btn-secondary btn-sm shadow p-2 btn-bg  m-2" href="#" role="button">테스트</a></div>
        </div>
    </div>
    <!-- end header -->

    <div class="row p-3 justify-content-evenly">
        <div class="col-lg-5 col-xs-12 p-3 gap-3 rounded-3  text-center">
            <div class="profile_head p-3  gx-2">
                <p>당신의 도시계획 유형은</p>
                <h4 class="fw-bold">사회중시_H형 시장님</h4>
                <h4 class="fw-bold">SSH</h4>
            </div>
            <div class="profile_image p-3  gx-2">
                <picture>
                    <source srcset="<?php echo base_url('resources/images/personality/ssh.svg')?>" type="image/svg+xml">
                    <img src="<?php echo base_url('resources/personality/personality/images/ssh.svg')?>" class="img-fluid" alt="...">
                </picture>
                <a class="btn btn-secondary btn-sm shadow p-2 btn-bg  m-2" href="#" role="button">테스트</a>
            </div>
        </div>

        <div class="col-lg-5 col-xs-12 p-3 d-grid gap-3">
            <div class="scale-div col-12 p-3 gx-2">
                <picture>
                    <source srcset="<?php echo base_url('resources/images/scale/scale1.svg')?>" type="image/svg+xml">
                    <img src="<?php echo base_url('resources/images/scale1.svg')?>" class="img-fluid" alt="...">
                </picture>
            </div>
            <div class="scale-div col-12 p-3 gx-2">
                <picture>
                    <source srcset="<?php echo base_url('resources/images/scale/scale2.svg')?>" type="image/svg+xml">
                    <img src="<?php echo base_url('resources/images/scale1.svg')?>" class="img-fluid" alt="...">
                </picture>
            </div>
            <div class="scale-div col-12 p-3 gx-2">
                <picture>
                    <source srcset="<?php echo base_url('resources/images/scale/scale3.svg')?>" type="image/svg+xml">
                    <img src="<?php echo base_url('resources/images/scale1.svg')?>" class="img-fluid" alt="...">
                </picture>
            </div>
        </div>
    </div>
</div>