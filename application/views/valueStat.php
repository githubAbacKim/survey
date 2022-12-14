<style>
    .scale-div {
        border-radius: 2em;
    }

    .titleBtn {
        background-color: #FAD58C;
        color: #F57600;
        border-radius: 25px;
    }
    .titleLabels {
        border-radius: 25px;
        font-weight: bolder;
    }
    .typelabels{
        background-color: white;
        color: black;
        border-radius: 25px;
    }
    .picture-container {
        position: relative;
        text-align: center;
        color: white;
    }
    {
        margin-top: 5%;
    }
    /* div{
        border:solid 1px;
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
            <div class="col-auto mt-3"><a href="<?php echo site_url('page/') ?>" class="navbar-brand logo">AI 도시를
                    부탁해!</a></div>
        </div>
        <div class="col-lg-7 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-lg-1">
            <div class="p-2 bd-highlight">
                <div class="btn-bg shadow p-3 btn-bg text-center">처음으로</div>
            </div>
            <div class="mt-2 p-2 bd-highlight">
                <a class="btn btn-lg p-2 text-color" href="<?php echo site_url('page/') ?>" role="button">다시하기</a>
            </div>
        </div>
    </div>
    <!-- end header -->
    <div class="row">
        <form id="searchform" method="post">
        <div class="col-lg-8 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight offset-lg-3 gap-3">
            <div class="p-2 bd-highlight">
                <a class="btn btn-secondary btn-sm shadow p-3 btn-bg" id="search" role="button">조회</a>
            </div>
            <div class="col-auto mt-2">
                <label for="form-select" class="select-label text-label-drop-down">학년구분</label>
                <select id="elem" name="elem" class="form-select form-select-lg bg-color border-button gap-3">
                  <option value="">고르다</option>
                  <option value="1학년">1학년</option>
                  <option value="2학년">2학년</option>
                  <option value="3학년">3학년</option>
                  <option value="4학년">4학년</option>
                  <option value="5학년">5학년</option>
                  <option value="6학년">6학년</option>
                </select>
                <select id="highschool" name="highschool" class="form-select form-select-lg bg-color border-button">
                    <option value="">고르다</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <select id="college" name="college" class="form-select form-select-lg bg-color border-button">
                    <option value="">고르다</option>
                    <option value="인문사회">인문사회</option>
                    <option value="자연 | 공학">자연 | 공학</option>
                    <option value="예체능">예체능</option>
                </select>
                <select id="public" name="public" class="form-select form-select-lg bg-color border-button">
                    <option value="인문사회">일반</option>
                </select>
            </div>
            <div class="col-auto mt-2">
                <label for="form-select" class="select-label text-label-drop-down">학교급</label>
                <select id="school_level" name="school_level" class="form-select form-select-lg bg-color border-button">
                    <option value="초등학생">초등학생</option>
                    <option value="중학생">중학생</option>
                    <option value="고등학생">고등학생</option>
                    <option value="대학">대학생</option>
                    <option value="일반인">일반인</option>
                </select>
            </div>
            <div class="col-auto mt-2">
                <label for="form-select" class="select-label text-label-drop-down">성별</label>
                <select id="gender" name="gender" class="form-select form-select-lg bg-color border-button">
                    <option value="">고르다</option>
                    <option value="남성">남성 </option>
                    <option value="여성">여성</option>
                </select>
            </div>
        </div>
        </form>
    </div>

    <div class="row p-2 justify-content-evenly">
        <div class="col-lg-4 col-xs-12 rounded-3 align-self-center">
            <div class="p-3">
                <canvas id="pie-chart" width="1200" height="1200"></canvas>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
            </div>
        </div>
        <template id="linktemplate">
            <div class="col-lg-12 d-flex typelabels mt-2">
                <div class="col-lg-3 text-center titleLabels p-1" id="{{id}}">{{type}}</div>
                <div class="col-lg-9 text-center labeldesc p-1"><h>{{type_desc}}</span></div>
            </div>
        </template>
        <div class="col-lg-3 col-xs-12 align-self-center" id="linkCont">        
        </div>

        <template id="scaletemplate">
            <div class="col-lg-12 profile_head text-color">
                <div class="col-lg-4 text-center offset-4 shadow p-2 titleBtn">{{type}}</div>
            </div>
            <div class="scale-contval">
                <div class="scale-div col-12 gx-2 position-relative">
                    <picture class="picture-container d-flex">
                        <source srcset="<?php echo base_url();?>{{scalesh}}" type="image/svg+xml">
                        <img src="<?php echo base_url();?>{{scalesh}}" class="img-fluid" alt="...">
                        <div class="val{{labelsh1}} {{rotate1}}" id="sh1">
                            <p class="scalelabel">인간존엄성</p>
                        </div>
                        <div class="val{{labelsh2}} {{rotate1}}">
                            <p class="scalelabel" id="sh2">사회공공성</p>
                        </div>
                    </picture>
                </div>
                <div class="scale-div col-12 gx-2  position-relative">
                    <picture class="picture-container d-flex">
                        <source srcset="<?php echo base_url()?>{{scalets}}" type="image/svg+xml">
                        <img src="<?php echo base_url()?>{{scalets}}" class="img-fluid" alt="...">
                        <div class="val{{labelts1}} {{rotate2}}">
                            <p class="scalelabel" id="ts1">기술합목적성</p>
                        </div>
                        <div class="val{{labelts2}} {{rotate2}}">
                            <p class="scalelabel" id="ts2">사회공공성</p>
                        </div>
                    </picture>
                </div>
                <div class="scale-div col-12 gx-2 position-relative">
                    <picture class="picture-container d-flex">
                        <source srcset="<?php echo base_url()?>{{scaleth}}" type="image/svg+xml">
                        <img src="<?php echo base_url()?>{{scaleth}}" class="img-fluid" alt="...">
                        <div class="val{{labelth1}} {{rotate3}}">
                            <p class="scalelabel" id="th1">기술합목적성</p>
                        </div>
                        <div class="val{{labelth2}} {{rotate3}}">
                            <p class="scalelabel" id="th2">인간존엄성</p>
                        </div>
                    </picture>
                </div>
            </div>
        </template>
        <div class="col-lg-4 col-xs-12 d-grid gap-3" id="scaleCont">            
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
    
</div>
<script src="<?php echo base_url('resources/js/valuestat.js');?>"></script>
