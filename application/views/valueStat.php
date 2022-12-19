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


    .picture-container {
        position: relative;
        text-align: center;
        color: white;
    }


    /* div {
        border: 1px solid;
    } */
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
            <div class="col-auto mt-3"><a href="<?php echo base_url('survey/') ?>" class="navbar-brand logo">AI 도시를
                    부탁해!</a></div>
        </div>
        <div class="col-lg-7 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-lg-1">
            <div class="p-2 bd-highlight">
                <div class="btn-bg shadow p-3 btn-bg text-center">처음으로</div>
            </div>
            <div class="mt-2 p-2 bd-highlight">
                <a class="btn btn-lg p-2 text-color" href="<?php echo base_url('survey/') ?>" role="button">다시하기</a>
            </div>
        </div>
    </div>
    <!-- end header -->
    <div class="row">
        <div class="col-lg-8 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-lg-3 gap-3">
            <div class="p-2 bd-highlight" id="start-button">
                <a class="btn btn-secondary btn-sm shadow p-3 btn-bg" href="#" role="button">조회</a>
            </div>
            <div class="col-auto mt-2">
                <label for="form-select" class="select-label text-label-drop-down">학교급</label>
                <select id="elem" class="form-select form-select-lg bg-color border-button gap-3">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <select id="highschool" class="form-select form-select-lg bg-color border-button">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <select id="college" class="form-select form-select-lg bg-color border-button">
                    <option value="인문사회">인문사회</option>
                    <option value="자연 | 공학">자연 | 공학</option>
                    <option value="예체능">예체능</option>
                </select>
                <select id="public" class="form-select form-select-lg bg-color border-button">
                    <option value="인문사회">일반</option>
                </select>
            </div>
            <div class="col-auto mt-2">
                <label for="form-select" class="select-label text-label-drop-down">학교급</label>
                <select id="school_level" class="form-select form-select-lg bg-color border-button">
                    <option value="초등학교">초등학생</option>
                    <option value="중학교">중학생</option>
                    <option value="고등학교">고등학생</option>
                    <option value="대학">대학생</option>
                    <option value="일반인">일반인</option>
                </select>
            </div>
            <div class="col-auto mt-2">
                <label for="form-select" class="select-label text-label-drop-down">성별</label>
                <select id="gender" class="form-select form-select-lg bg-color border-button">
                    <option value="남성">남성
                        <hr class="dropdown-divider">
                    </option>
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
                    <picture class="picture-container  d-flex">
                        <source srcset="<?php echo base_url('resources/images/scale/scale1.svg') ?>"
                            type="image/svg+xml">

                        <div class="a-caption-left">
                            <p class="text-color">a left</p>
                        </div>

                        <img src="<?php echo base_url('resources/images/scale1.svg') ?>" class="img-fluid" alt="...">

                        <div class="a-caption-right">
                            <p class="text-color">a right</p>
                        </div>

                    </picture>
                </div>



                <div class=" col-12 picture-image">
                    <picture class="picture-container  d-flex">
                        <source srcset="<?php echo base_url('resources/images/scale/scale2.svg') ?>"
                            type="image/svg+xml">
                        <div class="b-caption-left">
                            <p class="text-color">b left</p>
                        </div>
                        <img src="<?php echo base_url('resources/images/scale1.svg') ?>" class="img-fluid" alt="...">
                        <div class="b-caption-right">
                            <p class="text-color">b right</p>
                        </div>
                    </picture>
                </div>




                <div class=" col-12 picture-image">
                    <picture class="picture-container  d-flex">
                        <source srcset="<?php echo base_url('resources/images/scale/scale3.svg') ?>"
                            type="image/svg+xml">

                        <div class="c-caption-left">
                            <p class="text-color">a left</p>
                        </div>

                        <img src="<?php echo base_url('resources/images/scale1.svg') ?>" class="img-fluid" alt="...">

                        <div class="c-caption-right">
                            <p class="text-color">c right</p>
                        </div>
                    </picture>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="./../resources/js/valuestat.js"></script>