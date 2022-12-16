<style>
    .scale-div {
        border-radius: 2em;
        background-color: white;
    }

    .titleBtn {
        background-color: #FAD58C;
        color: #F57600;
        border-radius: 25px;
    }
</style>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">item choose</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnclose">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                "여기를 클릭함으로써 본인은 약관을 읽고 이해했음을 진술합니다." </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnclose">close</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid p-3">
    <!-- header -->
    <div class="row">
        <div class="col-lg-2 col-xs-12 p-3 text-center offset-lg-1">
            <a href="<?php echo base_url('survey/'); ?>" class="navbar-brand logo">AI 도시를 부탁해!</a>
        </div>
        <div class="col-lg-7 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-lg-1">

            <div class="p-2 bd-highlight">
                <a class="btn btn-secondary btn-sm shadow p-2 btn-bg  m-2"
                    href="<?php echo base_url('survey/questions'); ?>">처음으로</a>
            </div>

            <div class="mt-3 p-2 bd-highlight" id="redo">
                <a class="Abtn  btn-lg  p-2 text-color  m-2" href="#" role="button">다시하기</a>
            </div>
            <div class="mt-3 p-2 bd-highlight"><a class="Abtn  btn-lg  p-2 text-color  m-2"
                    href="<?php echo base_url('survey/questions') ?>" role="button">문항보기</a>
            </div>
        </div>
    </div>
    <!-- end header -->
    <div class="row">
        <div class="col-lg-7 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-lg-4">
            <div class="p-2 bd-highlight"><a class="btn btn-secondary btn-sm shadow p-2 btn-bg" href="#" role="button"
                    id="lookup">조회</a>
            </div>
            <div class="col-lg-3 mt-3">
                <label for="form-select" class="select-label text-label-drop-down">학년구분</label>
                <select id="classification" class="form-select form-select-sm bg-color border-button">
                    <option>선택</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            <div class="col-lg-3 mt-3">
                <label for="form-select" class="select-label text-label-drop-down">학교급</label>
                <select id="schoollevel" class="form-select form-select-sm bg-color border-button ">
                    <option>선택</option>
                    <option value="elementary">초등학생</option>
                    <option value="middleschool">중학생</option>
                    <option value="highschool">고등학생</option>
                    <option value="college">대학생</option>
                    <option value="public">일반인</option>
                </select>
            </div>
            <div class="col-lg-3 mt-3">
                <label for="form-select" class="select-label text-label-drop-down">성별</label>
                <select id="gender" class="form-select form-select-sm bg-color border-button">
                    <option>선택</option>
                    <option value="male">남성</option>
                    <option value="female">여성</option>
                </select>
            </div>
        </div>

    </div>


    <div class="row p-5 justify-content-evenly">
        <div class="col-lg-7 col-xs-12 p-3  rounded-3 mt-5">
            <div class=" p-3">
                <canvas id="pie-chart" width="1200" height="550"></canvas>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
            </div>
        </div>

        <div class="col-lg-3 col-xs-12 d-grid gap-3">
            <div class="col-lg-12 profile_head p-3 text-color">
                <div class="col-lg-4 text-center offset-4 shadow p-3 titleBtn">STH</div>
            </div>
            <div class="border border-warning rounded text-color">
                <div class=" col-12 picture-image">
                    <picture>
                        <source srcset="<?php echo base_url('resources/images/scale/scale1.svg') ?>"
                            type="image/svg+xml">
                        <img src="<?php echo base_url('resources/images/scale1.svg') ?>" class="img-fluid" alt="...">
                    </picture>
                </div>
                <div class=" col-12 picture-image">
                    <picture>
                        <source srcset="<?php echo base_url('resources/images/scale/scale2.svg') ?>"
                            type="image/svg+xml">
                        <img src="<?php echo base_url('resources/images/scale1.svg') ?>" class="img-fluid" alt="...">
                    </picture>
                </div>
                <div class=" col-12 picture-image">
                    <picture>
                        <source srcset="<?php echo base_url('resources/images/scale/scale3.svg') ?>"
                            type="image/svg+xml">
                        <img src="<?php echo base_url('resources/images/scale1.svg') ?>" class="img-fluid" alt="...">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('resources/js/valuestat.js') ?>" type="module">