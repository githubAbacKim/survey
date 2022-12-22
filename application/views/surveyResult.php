<style>
    .scale-div {
        background: linear-gradient(270.51deg, rgba(255, 255, 255, 0) -0.1%, rgba(255, 255, 255, 0.336495) 16.1%, rgba(255, 255, 255, 0.34) 89.76%, rgba(255, 255, 255, 0) 100.21%);
        border-radius: 32px;
    }

    .scale-div image {
        width: 642.2px;
        height: 172.19px;
    }

    div {
        border: 1px solid;
    }
</style>
<div class="container-fluid p-3">
    <!-- header -->
    <div class="row p-3 justify-content-evenly">
        <div class="col-lg-2 col-xs-12 p-3 text-center">
            <a href="<?php echo base_url('survey/') ?>" class="navbar-brand logo">AI 도시를 부탁해!</a>
        </div>
        <div class="col-lg-6 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight">
            <div class="p-2 bd-highlight">
                <a class="btn btn-secondary btn-sm shadow p-2 btn-bg m-2">처음으로</a>
            </div>
            <div class="p-2 bd-highlight mt-3">
                <a class="text-color p-2 m-2" href="<?php echo base_url('survey/index') ?>" role="button">다시하기</a>
            </div>
            <div class="p-2 bd-highlight mt-3">
                <a class="text-color p-2 m-2" href="<?php echo base_url('survey/questions') ?>" role="button">문항보기</a>
            </div>
        </div>
    </div>
    <!-- end header -->

    <div class="row p-3 justify-content-evenly">
        <div class="col-lg-5 col-xs-12 p-3 gap-3 rounded-3  text-center">
            <div class="profile_head p-3  gx-2 text-color">
                <p>당신의 도시계획 유형은</p>
                <h4 class="fw-bold">사회중시_H형 시장님</h4>
                <h4 class="fw-bold">SSH</h4>
            </div>

            <div class="profile_image p-3 gx-2">
                <picture>
                    <source srcset="<?php echo base_url('resources/images/personality/ssh.svg') ?>"
                        type="image/svg+xml">
                    <img src="<?php echo base_url('resources/personality/personality/images/ssh.svg') ?>"
                        class="img-fluid" alt="...">

                </picture>

                <div class="col-lg-12  text-color">
                    <a class="btn btn-secondary btn-sm shadow p-3 btn-bg  m-2"
                        href="<?php echo base_url('survey/questionStatistics') ?>" role="button">테스트</a>
                </div>

            </div>
        </div>
        <div class="col-lg-5 col-xs-12 p-3 d-grid gap-3">
            <div class="scale-div col-12 gx-2 position-relative">
                <picture class="picture-container d-flex">
                    <source srcset="<?php echo base_url('resources/images/scale/scale1.svg') ?>" type="image/svg+xml">
                    <img src="<?php echo base_url('resources/images/scale1.svg') ?>" class="img-fluid" alt="...">
                    <div class="a-sr-caption-left w-auto">
                        <p class="lg-scale-sr-text sr-rotate-left" id="lg-p">인간존엄성</p>
                    </div>
                    <div class="a-sr-caption-right w-auto">
                        <p class="sm-scale-sr-text sr-rotate-left" id="sm-p">사회공공성</p>
                    </div>
                </picture>
            </div>
            <div class="scale-div col-12 gx-2  position-relative">
                <picture class="picture-container d-flex">
                    <!--   <div class="col-lg-2"></div> -->
                    <source srcset="<?php echo base_url('resources/images/scale/scale2.svg') ?>" type="image/svg+xml">
                    <img src="<?php echo base_url('resources/images/scale1.svg') ?>" class="img-fluid" alt="...">
                    <div class="b-sr-caption-left w-auto">
                        <p class="sm-scale-sr-text sr-rotate-right" id="sm-p">기술합목적성</p>
                    </div>
                    <div class="b-sr-caption-right w-auto">
                        <p class="lg-scale-sr-text sr-rotate-right" id="lg-p">사회공공성</p>
                    </div>

                </picture>
            </div>
            <div class="scale-div col-12 gx-2  position-relative">
                <picture class="picture-container d-flex">
                    <!--  <div class="col-lg-2"></div> -->
                    <source srcset="<?php echo base_url('resources/images/scale/scale3.svg') ?>" type="image/svg+xml">
                    <img src="<?php echo base_url('resources/images/scale1.svg') ?>" class="img-fluid" alt="...">
                    <div class="c-sr-caption-left w-auto">
                        <p class="lg-scale-sr-text sr-rotate-left" id="lg-p">기술합목적성</p>
                    </div>
                    <div class="c-sr-caption-right w-auto">
                        <p class="sm-scale-sr-text sr-rotate-left" id="sm-p">인간존엄성</p>
                    </div>
                </picture>
            </div>
        </div>
    </div>