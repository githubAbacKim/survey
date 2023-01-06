<style>
    .scale-div {
        background: linear-gradient(270.51deg, rgba(255, 255, 255, 0) -0.1%, rgba(255, 255, 255, 0.336495) 16.1%, rgba(255, 255, 255, 0.34) 89.76%, rgba(255, 255, 255, 0) 100.21%);
    }
    .profile_image picture image{
        height: 100px !important;
    }
    .cancelbtn, .redobtn {
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    }

    button:hover {
    opacity:1;
    }

    /* Float cancel and delete buttons and add an equal width */
    .cancelbtn, .redobtn {
    float: left;
    width: 45%;
    }

    /* Add a color to the cancel button */
    .cancelbtn {
    /* background-color: #ccc; */
    border: solid 1px #ccc;
    color: black;
    }

    /* Add a color to the delete button */
    .redobtn {
    /* background-color: #f44336; */
    border: solid 1px #ccc;
    color: black;
    }
    /* picture,div {
        border: 1px solid;
    } */
</style>
<div class="container-fluid p-3">
    <!-- header -->
    <div class="row p-3 justify-content-evenly">
        <div class="col-lg-2 col-xs-12 p-3 text-center">
            <a href="<?php echo site_url('page/') ?>" class="navbar-brand logo">AI 도시를 부탁해!</a>
        </div>
        <div class="col-lg-6 col-xs-12 p-3 d-flex flex-row-reverse bd-highlight">
            <div class="p-2 bd-highlight">
                <a class="btn btn-secondary btn-sm shadow p-2 btn-bg m-2">처음으로</a>
            </div>
            <div class="p-2 bd-highlight mt-3">
                <a class="text-color p-2 m-2" id="redo" role="button">다시하기</a>
            </div>
            <div class="p-2 bd-highlight mt-3">
                <a class="text-color p-2 m-2" href="<?php echo site_url('page/questions') ?>" role="button">문항보기</a>
            </div>
        </div>
    </div>
    <!-- end header -->

    <div class="row p-3 ">
        <template id="profileTemp">
            <div class="col-lg-9 offset-lg-1">
                <div class="profile_head text-color">
                    <p>당신의 도시계획 유형은</p>
                    <h4 class="fw-bold fs-5">{{type_mayor}}</h4>
                    <h4 class="fw-bold fs-5">{{type}}</h4>
                </div>
                <div class="profile_image">
                
                        <picture>
                            <source srcset="<?php echo base_url()?>{{profile}}" type="image/svg+xml">
                            <img src="<?php echo base_url()?>{{profile}}" class="img-fluid" alt="...">
                        </picture>

                        <div class="col-lg-12  text-color">
                            <a class="btn btn-secondary btn-sm shadow p-3 btn-bg  m-2" href="<?php echo site_url('page/questionStatistics') ?>" role="button">전체 통계보기</a>
                        </div>
                
                </div>
            </div>
        </template>   
        <div class="col-lg-3 col-xs-12 offset-lg-2 rounded-3 text-center" id="prof_cont">            
        </div>

        <template id="scaleTemp">
            <div class="scale-div position-relative mt-3 align-self-center">
                <picture class="picture-container">
                    <source srcset="<?php echo base_url();?>{{scalesh}}" type="image/svg+xml">
                    <img src="<?php echo base_url();?>{{scalesh}}" class="img-fluid" alt="...">
                    <div class="{{labelsh1}} {{rotate1}}" id="sh1">
                        <p class="scalelabel">인간존엄성</p>
                    </div>
                    <div class="{{labelsh2}} {{rotate1}}">
                        <p class="scalelabel" id="sh2">사회공공성</p>
                    </div>
                </picture>
            </div>
            <div class="scale-div position-relative mt-3 align-self-center">
                <picture class="picture-container">
                    <source srcset="<?php echo base_url()?>{{scalets}}" type="image/svg+xml">
                    <img src="<?php echo base_url()?>{{scalets}}" class="img-fluid" alt="...">
                    <div class="{{labelts1}} {{rotate2}}">
                        <p class="scalelabel" id="ts1">기술합목적성</p>
                    </div>
                    <div class="{{labelts2}} {{rotate2}}">
                        <p class="scalelabel" id="ts2">사회공공성</p>
                    </div>
                </picture>
            </div>
            <div class="scale-div position-relative mt-3 align-self-center">
                <picture class="picture-container">
                    <source srcset="<?php echo base_url()?>{{scaleth}}" type="image/svg+xml">
                    <img src="<?php echo base_url()?>{{scaleth}}" class="img-fluid" alt="...">
                    <div class="{{labelth1}} {{rotate3}}">
                        <p class="scalelabel" id="th1">기술합목적성</p>
                    </div>
                    <div class="{{labelth2}} {{rotate3}}">
                        <p class="scalelabel" id="th2">인간존엄성</p>
                    </div>
                </picture>
            </div> 
        </template>   
        <div class="col-lg-4 col-xs-12 offset-lg-1" id="scale_cont">                       
        </div>
    </div>

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
                <button type="button" class="cancelbtn" data-bs-dismiss="modal">취소</button>
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

    <script src="<?php echo base_url('resources/js/sresult.js') ?>" type="module"></script>
