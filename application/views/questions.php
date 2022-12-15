<style>
    .scale-div {
        border-radius: 2em;
        background-color: white;
    }
</style>
<div class="container-fluid p-3">
    <!-- header -->
    <div class="row">
        <div class="col-lg-2 col-xs-12 p-3 text-center offset-lg-1">
            <a href="<?php echo base_url('survey/') ?>" class="navbar-brand logo">AI 도시를 부탁해!</a>
        </div>
        <div class="col-lg-7 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-lg-1">

            <div class="p-2 bd-highlight"><a class="btn btn-secondary btn-sm shadow p-2 btn-bg  m-2" href="#">처음으로</a>
            </div>
            <div class="mt-3 p-2 bd-highlight"><a class="Abtn  btn-lg  p-2 text-color  m-2" href="#"
                    role="button">다시하기</a>
            </div>
        </div>
    </div>
    <!-- end header -->

    <div class="row p-5 justify-content-evenly d-flex flex-row-reverse bd-highlight ">

        <div class="col-lg-8 col-xs-12 p-5 question-card">
            <h5 class="fw-bold mt-4 text-color">1. AI 스피커를 통해 가정의 일상 대화를 수집하여 위기 상황시 출동하는 사회 안전망을 만들려고 합니다.
                정확도를 높이기 위해서는 모든 가정에서 AI 스피커를 설치해야합니다. </h5>

            <!-- question div -->
            <div class="col-lg-12  col-xs-12   d-flex  bd-highlight">

                <div class="col-lg-6 question-stat-card p-4 " data-value="agree" data-qnum="1">
                    <div class="text-center p- text-color">
                        <picture>
                            <img class="img-fluid"
                                src="<?php echo base_url("resources/images/question_default_images/q1agree.svg") ?>"
                                alt="agree" id="answer">
                        </picture>

                        <p class="m-2 p-2"> 찬성 : 노약자나 장애인 등의 사회 취약층 등에게
                            안전에 도움이되어 사회공공에 이익이 됩니다.</p>
                    </div>
                </div>
                <div class=" col-lg-6 question-stat-card p-4" data-value="disagree" data-qnum="1">
                    <div class="text-center p-5 text-color">
                        <picture>
                            <img class="img-fluid"
                                src="<?php echo base_url("resources/images/question_default_images/q1disaggree.svg") ?>"
                                alt="agree" id="answer">
                        </picture>

                        <p class="p-2 m-2"> 반대 : 개인의 사생활이 노출될 수 있어
                            인간 존엄성을 해칩니다.</p>
                    </div>

                </div>
            </div>
        </div>


    </div>

    <div class="row p-5 justify-content-evenly d-flex flex-row-reverse bd-highlight ">

        <div class="col-lg-8 col-xs-12 p-5 question-card">
            <h5 class="fw-bold mt-4 text-color">1. AI 스피커를 통해 가정의 일상 대화를 수집하여 위기 상황시 출동하는 사회 안전망을 만들려고 합니다.
                정확도를 높이기 위해서는 모든 가정에서 AI 스피커를 설치해야합니다. </h5>

            <!-- question div -->
            <div class="col-lg-12  col-xs-12   d-flex  bd-highlight">

                <div class="col-lg-6 question-stat-card p-4 " data-value="agree" data-qnum="1">
                    <div class="text-center p- text-color">
                        <picture>
                            <img class="img-fluid"
                                src="<?php echo base_url("resources/images/question_default_images/q1agree.svg") ?>"
                                alt="agree" id="answer">
                        </picture>

                        <p class="m-2 p-2"> 찬성 : 노약자나 장애인 등의 사회 취약층 등에게
                            안전에 도움이되어 사회공공에 이익이 됩니다.</p>
                    </div>
                </div>
                <div class=" col-lg-6 question-stat-card p-4" data-value="disagree" data-qnum="1">
                    <div class="text-center p-5 text-color">
                        <picture>
                            <img class="img-fluid"
                                src="<?php echo base_url("resources/images/question_default_images/q1disaggree.svg") ?>"
                                alt="agree" id="answer">
                        </picture>

                        <p class="p-2 m-2"> 반대 : 개인의 사생활이 노출될 수 있어
                            인간 존엄성을 해칩니다.</p>
                    </div>

                </div>
            </div>
        </div>


    </div>

</div>