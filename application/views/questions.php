<style>
    .scale-div {
        background: rgba(255, 255, 255, 0.33);
        border-radius: 18px;
    }
</style>
<div class="container-fluid p-3">
    <!-- header -->
    <div class="row">
        <div class="col-lg-2 col-xs-12 p-3 text-center offset-lg-1">
            <a href="<?php echo base_url('survey/') ?>" class="navbar-brand logo">AI 도시를 부탁해!</a>
        </div>
        <div class="col-lg-7 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-lg-1">

            <div class="p-2 bd-highlight">
                    <a class="btn btn-secondary btn-sm shadow p-2 btn-bg  m-2" href="<?php echo base_url('survey/') ?>">처음으로</a>
            </div>
            <div class="mt-3 p-2 bd-highlight">
                <a class="Abtn  btn-lg  p-2 text-color  m-2" href="<?php echo base_url('survey/') ?>" role="button">다시하기</a>
            </div>
        </div>
    </div>
    <!-- end header -->
    <template id="data-template">
        <div class="col-lg-8 col-xs-12 p-5 question-card">
            <h5 class="fw-bold mt-4 text-color">{{question}}</h5>
            <!-- question div -->
            <div class="col-lg-12  col-xs-12   d-flex  bd-highlight">
                <div class="col-lg-6 question-stat-card p-4 " data-value="agree" data-qnum="1">
                    <div class="text-center p-5 text-color">
                        <picture>
                            <img class="img-fluid" src='./../{{agree_img}}' alt="agree" id="answer">
                        </picture>
                        <p class="m-2 p-2">{{agree_desc}}</p>
                    </div>
                </div>
                <div class=" col-lg-6 question-stat-card p-4" data-value="disagree" data-qnum="1">
                    <div class="text-center p-5 text-color">
                        <picture>
                            <img class="img-fluid"
                                src='./../{{disagree_img}}' alt="disagree" id="answer">
                        </picture>

                        <p class="p-2 m-2">{{disagree_desc}}</p>
                    </div>
                </div>
            </div>
        </div>
    </template>
    <div class="row p-5 gap-3 justify-content-evenly d-flex flex-row-reverse bd-highlight" id="questCont">        
    </div>

</div>
<script src="./../resources/js/question.js"></script>