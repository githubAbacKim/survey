<style>
    /* div{
        border:solid 1px;
    } */
</style>

<!-- Modal -->
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
<!-- /Modal -->
<div class="container-fluid p-3">
    <!-- header -->
    <div class="row">
        <div class="col-lg-2 col-xs-12 p-3 text-center offset-lg-1">
            <div class="col-auto mt-3"><a href="<?php echo base_url('survey/') ?>" class="navbar-brand logo">AI 도시를 부탁해!</a></div>            
        </div>
        <div class="col-lg-7 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-lg-1">
            <div class="p-2 bd-highlight">
                <div class="btn-bg shadow p-3 btn-bg text-center">처음으로</div>
            </div>
            <div class="mt-2 p-2 bd-highlight">
                <a class="btn btn-lg p-2 text-color" href="<?php echo base_url('survey/') ?>"
                    role="button">다시하기</a>
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
                    <option value="남성">남성<hr class="dropdown-divider"></option>
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
                <div class="progress-bar" id="{{agreeprog}}" role="progressbar" style="width:60%;" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-success" id="{{disagreeprog}}"  style="width:40%;" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                <span class="bold text-color ml-1">반대</span>
            </div>
            <!-- question div -->
            <div class="col-lg-12  col-xs-12 p-3 gap-2  d-flex  bd-highlight">

                <div class="col-lg-6 question-stat-card p-4 agree-question-component" id='{{agreediv}}'
                    data-value="agree" data-qnum='{{qnum}}'>
                    <div class="text-center p-2 text-color">
                        <h5 class="fw-bold">
                            <input class="form-check-input checkbox" type="checkbox" value="agree" id="confirm_agree">
                            찬성 : <span>{{agree_desc}}</span>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-6 question-stat-card p-4 disagree-question-card" id='{{disagreediv}}'
                    data-value="disagree" data-qnum='{{qnum}}'>
                    <div class="text-center p-2 text-color">
                        <h5 class="fw-bold">
                            <input class="form-check-input checkbox" type="checkbox" value="agree" id="confirm_agree">
                            내가 반대 : <span>{{disagree_desc}}</span>
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