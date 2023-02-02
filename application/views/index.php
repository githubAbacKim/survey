<style>
    #dummyBut {
        color: gray;
        width: 100px;
        opacity: 1;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">agree</h5>
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
<!-- <nav class="navbar navbar-light navbar-expand-lg p-5 nav">
    <div class="container-fluid">
        <div class="col-lg-2 col-xs-12 p-3 text-center offset-lg-2">
            <div class="col-auto mt-2"><a href="<?php echo site_url('page/') ?>" class="navbar-brand logo">AI 도시를
                    부탁해!</a></div>
        </div>
        <div class="navlist">
            <ul class="nav">          
                <li clas="nav-item">
                    <a class="btn btn-secondary btn-sm shadow p-2 btnWhite m-2" href="<?php echo site_url('page/aboutus') ?>" role="button">ABOUT</a>
                </li>
                <li clas="nav-item">
                    <a class="btn btn-secondary btn-sm shadow p-2 btn-bg m-2" href="<?php echo site_url('page/valueStatistic') ?>" role="button">가치 통계</a>
                </li>
                <li clas="nav-item">
                    <a class="btn btn-secondary btn-sm shadow p-2 btn-bg m-2" href="<?php echo site_url('page/questionStatistics') ?>" role="button">문항 통계</a>
                </li>   
                <li clas="nav-item">
                    <a class="btn btn-secondary btn-sm shadow p-2 btn-bg  m-2" href="<?php echo site_url('page/questions') ?>" role="button">문항 보기</a>
                </li>   
            </ul>
        </div>
    </div>
</nav> -->
<div class="container-fluid content">
    <h1 class="text-lg-center text-color text-style text-center">AI 도시를 부탁해!</h1>
    <p class="text-md normal-text-color">당신은 <b>AI 도시의 시장님</b>입니다. <br>AI와 관련된 다양한 상황에서<b> 당신의 입장을 선택</b>해주세요.</p>

    <div class="text-center">
        <p class="tp" data-toggle="tooltip" data-placement="bottom" title=" 수집된 자료는 인공지능 윤리 교육 연구를 위해 사용될 수 있습니다.">
            <span class="bold">동의</span>
            <input class="form-check-input checkbox" type="checkbox" value="agree" id="confirm_agree">
            수집된 자료는 인공지능 윤리 교육 연구를 위해 사용될 수 있습니다.
        </p>
    </div>
    <form id="startForm" action="<?php echo site_url('page/register_participants') ?>" method="POST">
        <div class="container-fluid text-center startCont">
            <img src="<?php echo base_url("resources/images/realstart.svg") ?>" class="startbut mt-3" id="submitform"
                alt="sumbit" data-toggle="modal">
            <img src="<?php echo base_url("resources/images/dummystart.svg") ?>" class="mt-3" id="dummyBut">
        </div>
        <!-- Footer -->
        <div class="footer text-center container">
            <!-- Grid container -->
            <div class="container">
                <div class="row">
                    <!-- Grid column -->    
                    <div class="col-lg-3 col-sm-12 text-center d-flex justify-content-evenly">
                        <div class="col col-lg-5 col-sm-5">
                            <label for="form-select" class="p-3 select-label text-label-drop-down">성별</label>
                        </div>
                        <div class="col col-lg-7 col-sm-7">                            
                            <select id="gender" name="gender" class="form-select form-select-lg bg-color border-button">
                                <optgroup class="p-3">
                                    <option value="">선택</option>
                                    <option value="남성">남성</option>
                                    <option value="여성">여성</option>
                                </optgroup>
                            </select>
                        </div>                        
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-3 col-sm-12 text-center d-flex justify-content-evenly">
                        <div class="col col-lg-5 col-sm-5">
                            <label for="form-select" class="p-3 select-label text-label-drop-down">학교급</label>
                        </div>
                        <div class="col col-lg-7 col-xs-7">
                            <select id="school_level" name="school_level" class="form-select form-select-lg bg-color border-button">
                                <optgroup>
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
                    <div class="col-lg-3 col-sm-12 text-center d-flex justify-content-evenly">
                        <div class="col col-lg-5 col-sm-5">
                            <label for="form-select" class="p-3 select-label text-label-drop-down">학년구분</label>
                        </div>
                        <div class="col col-lg-7 col-sm-7">
                            <select id="elem" name="elem" class="form-select form-select-lg bg-color border-button gap-3">
                                <optgroup>
                                    <option value="">선택</option>
                                    <option value="1학년">1학년</option>
                                    <option value="2학년">2학년</option>
                                    <option value="3학년">3학년</option>
                                    <option value="4학년">4학년</option>
                                    <option value="5학년">5학년</option>
                                    <option value="6학년">6학년</option>
                                </optgroup>
                            </select>
                            <select id="highschool" name="highschool"
                                class="form-select form-select-lg bg-color border-button">
                                <optgroup>
                                    <option value="">선택</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </optgroup>
                            </select>
                            <select id="college" name="college" class="form-select form-select-lg bg-color border-button">
                                <optgroup>
                                    <option value="">선택</option>
                                    <option value="인문사회">인문사회</option>
                                    <option value="자연 | 공학">자연 | 공학</option>
                                    <option value="예체능">예체능</option>
                                </optgroup>
                            </select>
                            <select id="public" name="public" class="form-select form-select-lg bg-color border-button">
                                <optgroup>
                                    <option value="">선택</option>
                                    <option value="인문사회">일반</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-3 col-sm-12 text-center d-flex justify-content-evenly">
                        <div class="col col-lg-5 col-sm-5">
                            <label for="form-select" class="p-3 select-label text-label-drop-down">지역규모</label>
                        </div>
                        <div class="col ol-lg-7 col-sm-7">
                            <select id="region" name="regional_scale" class="form-select form-select-lg bg-color border-button">
                                <optgroup>
                                    <option value="">선택</option>
                                    <option value="읍면지역">읍면지역</option>
                                    <option value="중소도시">중소도시</option>
                                    <option value="대도시">대도시</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row-->
            </div>
        </div>
    </form>
</div>
<!-- Modal -->
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
<div class="modal fade" id="valModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-body">
            <div class="alert alert-secondary text-center" role="alert">
                A simple danger alert—check it out!
            </div>
        </div>
        <div class="modal-footer justify-content-md-center gap-2">
            <button type="button" id="continuesurvey" class="redobtn">나가기</button>
            <button type="button" id="cancelsurvey" class="cancelbtn">취소</button>
        </div>
        </div>
    </div>
</div>
<!-- /Modal -->
<script src="<?php echo base_url('resources/js/index.js') ?>" type="module"></script>
