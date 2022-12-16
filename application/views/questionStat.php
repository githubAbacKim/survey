<style>
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
    <div class="row">
        <div class="col-lg-7 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-lg-4">
            <div class="p-2 bd-highlight"><a class="btn btn-secondary btn-sm shadow p-2 btn-bg  m-2" href="#"
                    role="button">조회</a>
            </div>
            <div class="col-lg-3 mt-3">
                <label for="form-select" class="select-label text-label-drop-down">성별</label>
                <select id="gender" class="form-select form-select-sm bg-color border-button">
                    <option>선택</option>
                    <option value="남성">남성</option>
                    <option value="여성">여성</option>
                </select>
            </div>
            <div class="col-lg-3 mt-3">
                <label for="form-select" class="select-label text-label-drop-down">성별</label>
                <select id="gender" class="form-select form-select-sm bg-color border-button ">
                    <option>선택</option>
                    <option value="남성">남성</option>
                    <option value="여성">여성</option>
                </select>
            </div>
            <div class="col-lg-3 mt-3">
                <label for="form-select" class="select-label text-label-drop-down">성별</label>
                <select id="gender" class="form-select form-select-sm bg-color border-button">
                    <option>선택</option>
                    <option value="남성">남성</option>
                    <option value="여성">여성</option>
                </select>
            </div>
        </div>
        <div class="col-lg-7 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-lg-4">
            <div class="text-center">
                <p>
                    <input class="form-check-input checkbox text-color" type="checkbox" value="agree"
                        id="confirm_agree">
                    내가 선택한 문항
                </p>
            </div>
        </div>
    </div>

    <template id="qstat-template">
        <div class="col-lg-8 col-xs-12 p-5 question-card">
            <h5 class="fw-bold mt-4 text-color">{{question}}</h5>

            <div class="progress mt-5 m-5">
                <!--
                    Here get the total agree and disgree in each question and 
                 -->
                <span class="bold text-color mr-1">찬성</span>
                <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                <span class="bold text-color ml-1">반대</span>
            </div>
            <!-- question div -->
            <div class="col-lg-12  col-xs-12 p-3 gap-2  d-flex  bd-highlight">

                <div class="col-lg-6 question-stat-card p-4 agree-question-component" id='{{agreediv}}' data-value="agree" data-qnum='{{qnum}}'>
                    <div class="text-center p-2 text-color">
                        <h5 class="fw-bold">
                            <input class="form-check-input checkbox" type="checkbox" value="agree" id="confirm_agree">
                            찬성 : {{agree_desc}}
                        </h5>
                    </div>
                </div>
                <div class="col-lg-6 question-stat-card p-4 disagree-question-card" id='{{disagreediv}}' data-value="disagree" data-qnum='{{qnum}}'>
                    <div class="text-center p-2 text-color">
                        <h5 class="fw-bold">
                            <input class="form-check-input checkbox" type="checkbox" value="agree" id="confirm_agree">
                            내가 반대 : {{disagree_desc}}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <div class="row p-5 gap-3 justify-content-evenly d-flex flex-row-reverse bd-highlight" id="questCont">
    </div>
</div>
<script src="./../resources/js/qstat.js"></script>