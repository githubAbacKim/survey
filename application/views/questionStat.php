<style>
     /* div {
        border: solid 1px;
    } */
    .bg-orange{
        background-color: #F3681A;
    }

    input[type="checkbox"]{
    background: url('../../resources/images/nocheckbox.svg') no-repeat;
    width:20px;
    height: 20px;
    border: none;
    }
    input[type="checkbox"]:checked{
    background: url('../../resources/images/checkbox.svg') no-repeat !important;
    width: 20px;
    height: 25px;
    }
    .question-stat-card{
        height: 18vh !important;
    }
    .qdesc{
        text-align: justify;
        justify-content: flex-end;
    }
    @media(min-width: 1920px) {
        .question-stat-card{
            height: 10vh !important;
        }
    }
</style>

<!-- /Modal -->
<div class="container p-3">
    <form id="searchform" method="post">
        <div class="row gap-2 justify-content-center">        
            <div class="col-lg-2 col-sm-12 text-center d-flex flex-row ">
                <div class="col col-lg-5 col-sm-5">
                    <label for="form-select" class="pt-3 select-label text-label-drop-down">성별</label>
                </div>
                <div class="col col-lg-7 col-sm-7">                            
                    <select id="gender" name="gender" class="form-select bg-color border-button">
                        <option value="전체">전체</option>
                        <option value="남성">남성</option>
                        <option value="여성">여성</option>
                    </select>
                </div>                        
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-2 col-sm-12 text-center d-flex flex-row ">
                <div class="col col-lg-5 col-sm-5">
                    <label for="form-select" class="pt-3 select-label text-label-drop-down">학교급</label>
                </div>
                <div class="col col-lg-7 col-xs-7">
                    <select id="school_level" name="school_level" class="form-select bg-color border-button">
                        <option value="전체">전체</option>
                        <option value="초등학생">초등학생</option>
                        <option value="중학생">중학생</option>
                        <option value="고등학생">고등학생</option>
                        <option value="대학">대학생</option>
                        <option value="일반인">일반인</option>
                    </select>
                </div> 
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-2 col-sm-12 text-center d-flex flex-row ">
                <div class="col col-lg-6 col-sm-5">
                    <label for="form-select" class="pt-3 select-label text-label-drop-down">학년구분</label>
                </div>
                <div class="col col-lg-6 col-sm-7">
                    <select id="elem" name="elem" class="form-select bg-color border-button gap-3">
                        <option value="전체">전체</option>
                        <option value="1학년">1학년</option>
                        <option value="2학년">2학년</option>
                        <option value="3학년">3학년</option>
                        <option value="4학년">4학년</option>
                        <option value="5학년">5학년</option>
                        <option value="6학년">6학년</option>
                    </select>
                    <select id="highschool" name="highschool" class="form-select bg-color border-button">
                        <option value="전체">전체</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <select id="college" name="college" class="form-select bg-color border-button">
                        <option value="전체">전체</option>
                        <option value="인문사회">인문사회</option>
                        <option value="자연 | 공학">자연 | 공학</option>
                        <option value="예체능">예체능</option>
                    </select>
                    <select id="public" name="public" class="form-select bg-color border-button">
                        <option value="전체">전체</option>
                        <option value="인문사회">일반</option>
                    </select>
                </div>
            </div>
            <!-- Grid column -->
            <div class="col-lg-2 col-sm-12 text-center bd-highlight">
                <a class="btn btn-secondary btn-sm shadow p-3 btn-bg" id="search" role="button">조회</a>
            </div>
        </div>
    </form>
    <template id="qstat-template">
        <div class="col-lg-10 col-xs-12 p-2 question-card">
            <h5 class="fw-bold mt-4 text-color">{{question}}</h5>
            <!-- Here get the total agree and disgree in each question -->
            <div class="container">
                <div class="row">
                    <div class="col-2 p-0 mt-5 text-nowrap text-center">
                        <span class="bold left-progress">찬성</span>
                    </div>
                    <div class="col-8 p-0">
                        <div class="progress mt-5 m-2">
                            <div class="progress-bar bg-success" id="{{agreeprog}}" role="progressbar" aria-valuemin="0"
                                aria-valuemax="100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="{{agreePercent}}"></div>
                            <div class="progress-bar bg-orange" id="{{disagreeprog}}" aria-valuemin="0"
                                aria-valuemax="100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="{{agreePercent}}"></div>
                        </div>
                    </div>
                    <div class="col-2 p-0 mt-5 text-nowrap text-center">
                        <span class="bold text-color right-progress">반대</span>
                    </div>
                </div>
            </div>
            <!-- question div -->
            <div class="container">
                <div class="row justify-content-evenly mt-5 gap-2">
                    <div class="col-lg-5 question-stat-card agree-question-component" id='{{agreediv}}' data-value="agree" data-qnum='{{qnum}}'>
                        <div class="p-3 text-color row statement-desc">
                            <!-- <div class="col-lg-1"><input class="form-check-input checkbox" name="checkbox{{qnum}}" type="checkbox" value="agree" id="confirm_agree"></div>                             -->
                            <div class="col-lg-2 col-xxl-2 col-sm-12 col-xs-12 statement-label pe-0">찬성 :</div>
                            <div class="col-lg-10 col-xxl-10 col-sm-12 col-xs-12 text-start"><span>{{agree_desc}}</span></div>
                        </div>
                    </div>
                    <div class="col-lg-5 question-stat-card agree-question-component" id='{{disagreediv}}'
                        data-value="disagree" data-qnum='{{qnum}}'>
                        <div class="p-3 text-color row statement-desc">
                            <!-- <div class="col-lg-1"><input class="form-check-input checkbox" name="checkbox{{qnum}}" type="checkbox" value="agree" id="confirm_agree"></div>                             -->
                            <div class="col-lg-2 col-xxl-2 col-sm-12 col-xs-12 statement-label pe-0">반대 :</div>
                            <div class="col-lg-10 col-xxl-10 col-sm-12 col-sm-12 text-start"><span>{{disagree_desc}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <div class="row mt-3 p-2 gap-3 justify-content-evenly d-flex flex-row-reverse bd-highlight" id="questCont">
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-body">
            <div class="alert alert-secondary text-center" role="alert">
                A simple danger alert—check it out!
            </div>
        </div>
        <div class="modal-footer justify-content-md-center gap-2">
            <button type="button" id="initiateRedo" class="redobtn">확인</button>
            <button type="button" class="cancelbtn" data-bs-dismiss="modal">닫다</button>
        </div>
        </div>
    </div>
</div>
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alertModalLabel">Error!!!</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" id="btnclose">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="alert alert-success" style="display:none" role="alert">A simple success alert—check it out!</div>
            <div class="alert alert-danger" style="display:none" role="alert">A simple danger alert—check it out!</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnclose">close</button>
            </div>
        </div>
    </div>
</div>
<!-- /Modal -->
<script src="<?php echo base_url('resources/js/qstat.js');?>"></script>
