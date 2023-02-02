<style>
    /*  div {
        border: solid 1px;
    } */
    .bg-orange{
        background-color: #F3681A;
    }
</style>

<!-- /Modal -->
<div class="container-fluid p-3">
    <!-- header -->
    <div class="row d-flex flex-row">
        <div class="col-lg-3 col-xs-12 p-3 text-center align-self-center offset-lg-1">
            <a href="<?php echo site_url('page/') ?>" class="navbar-brand logo">AI 도시를부탁해!</a>
        </div>
        <div class="col-lg-8 col-xs-12 d-flex justify-content-end bd-highlight">
            <div class="col-lg-2 bd-highlight align-self-center">
                <a class="btn btn-lg text-color" id="redo" role="button">다시하기</a>
            </div>
            <div class="col-lg-2 bd-highlight align-self-center">
                <a class="btn btn-lg text-color" href="<?php echo site_url('page/questions');?>" role="button">문항보기</a>
            </div>
            <div class="col-lg-3 col-sm-12 text-center bd-highlight align-self-center">
                <a class="btn btn-secondary btn-sm shadow ms-3 p-2 btn-bg" role="button">조회</a>
            </div>
        </div>
    </div>
    <!-- end header -->
    <form id="searchform" method="post">
        <div class="row mt-5 justify-content-end">        
            <div class="col-lg-2 col-sm-12 text-center d-flex flex-row ">
                <div class="col col-lg-5 col-sm-5">
                    <label for="form-select" class="p-3 select-label text-label-drop-down">성별</label>
                </div>
                <div class="col col-lg-7 col-sm-7">                            
                    <select id="gender" name="gender" class="form-select bg-color border-button">
                        <optgroup class="p-3">
                            <option value="전체">전체</option>
                            <option value="남성">남성</option>
                            <option value="여성">여성</option>
                        </optgroup>
                    </select>
                </div>                        
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-2 col-sm-12 text-center d-flex flex-row ">
                <div class="col col-lg-5 col-sm-5">
                    <label for="form-select" class="p-3 select-label text-label-drop-down">학교급</label>
                </div>
                <div class="col col-lg-7 col-xs-7">
                    <select id="school_level" name="school_level" class="form-select bg-color border-button">
                        <optgroup>
                            <option value="전체">전체</option>
                            <option value="초등학생">초등학생</option>
                            <option value="중학생">중학생</option>
                            <option value="고등학생">고등학생</option>
                            <option value="대학">대학생</option>
                            <option value="일반인">일반인</option>
                        </optgroup>
                    </select>
                </div> 
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-2 col-sm-12 text-center d-flex flex-row ">
                <div class="col col-lg-6 col-sm-5">
                    <label for="form-select" class="p-3 select-label text-label-drop-down">학년구분</label>
                </div>
                <div class="col col-lg-6 col-sm-7">
                    <select id="elem" name="elem" class="form-select bg-color border-button gap-3">
                        <option value="">선택</option>
                        <option value="1학년">1학년</option>
                        <option value="2학년">2학년</option>
                        <option value="3학년">3학년</option>
                        <option value="4학년">4학년</option>
                        <option value="5학년">5학년</option>
                        <option value="6학년">6학년</option>
                    </select>
                    <select id="highschool" name="highschool" class="form-select bg-color border-button">
                        <option value="">선택</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <select id="college" name="college" class="form-select bg-color border-button">
                        <option value="">선택</option>
                        <option value="인문사회">인문사회</option>
                        <option value="자연 | 공학">자연 | 공학</option>
                        <option value="예체능">예체능</option>
                    </select>
                    <select id="public" name="public" class="form-select bg-color border-button">
                        <option value="">선택</option>
                        <option value="인문사회">일반</option>
                    </select>
                </div>
            </div>
            <!-- Grid column -->
            <div class="col-lg-2 col-sm-12 text-center bd-highlight">
                <a class="btn btn-secondary btn-sm shadow p-2 btn-bg" id="search" role="button">조회</a>
            </div>
        </div>
    </form>

    <template id="qstat-template">
        <div class="col-lg-8 col-xs-12 p-5 question-card">
            <h5 class="fw-bold mt-4 text-color">{{question}}</h5>

            <!-- Here get the total agree and disgree in each question -->
            <div class="container">
                <div class="row">
                    <div class="col-1 mt-5 text-nowrap text-right">
                        <span class="bold left-progress">찬성</span>
                    </div>
                    <div class=" col-10">
                        <div class="progress mt-5 m-2">
                            <div class="progress-bar bg-success" id="{{agreeprog}}" role="progressbar" aria-valuemin="0"
                                aria-valuemax="300" data-toggle="tooltip" data-placement="right" title="100%"></div>
                            <div class="progress-bar bg-orange" id="{{disagreeprog}}" aria-valuemin="0"
                                aria-valuemax="300" data-toggle="tooltip" data-placement="left" title="900%"></div>
                        </div>
                    </div>
                    <div class="col-1  mt-5">
                        <span class="bold text-color right-progress">반대</span>
                    </div>
                </div>
            </div>

            <!-- question div -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 question-stat-card p-3 agree-question-component" id='{{agreediv}}' data-value="agree" data-qnum='{{qnum}}'>
                        <div class="text-center p-2 text-color d-flex">
                            <div class="col-lg-1"><input class="form-check-input checkbox" type="checkbox" value="agree" id="confirm_agree"></div>                            
                            <div class="col-lg-2">찬성 :</div>
                            <div class="col-lg-9"><span>{{agree_desc}}</span></div>
                        </div>
                    </div>
                    <div class="col-lg-6 question-stat-card p-4 disagree-question-card" id='{{disagreediv}}'
                        data-value="disagree" data-qnum='{{qnum}}'>
                        <div class="p-2 text-color d-flex">
                            <div class="col-lg-1 text-center"><input class="form-check-input checkbox" type="checkbox" value="agree" id="confirm_agree"></div>                            
                            <div class="col-lg-3 text-center">내가 반대 :</div>
                            <div class="col-lg-8 text-left"><span>{{disagree_desc}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <div class="row p-5 gap-3 justify-content-evenly d-flex flex-row-reverse bd-highlight" id="questCont">
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
