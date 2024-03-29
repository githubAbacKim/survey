<style>
    .scale-div {
        background: rgba(255, 255, 255, 0.33);
        border-radius: 18px;
    }
    /* div{
        border:solid 1px;
    } */
</style>


<div class="container p-3">    
    <template id="data-template">
        <div class="col-lg-10 col-sm-12 question-card shadow">
            <h5 class="fw-bold p-3 mt-4 text-color">{{question}}</h5>
            <!-- question div -->
            <div class="col-lg-12 d-flex bd-highlight">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 question-stat-card p-4 " data-value="agree" data-qnum="1">
                        <div class="text-color">
                            <picture>
                                <img class="img-fluid" src='<?php echo base_url();?>{{agree_img}}' alt="agree" id="answer">
                            </picture>
                            <!-- <p class="m-2 p-2">{{agree_desc}}</p> -->
                            <div class="p-2 text-color row mt-2">
                                <div class="col-lg-2 col-xxl-2 col-sm-12 statement-label">찬성 :</div>
                                <div class="col-lg-10 col-xxl-10 text-start"><span>{{agree_desc}}</span></div>
                            </div>
                        </div>
                        
                    </div>
                    <div class=" col-lg-6 col-sm-12 question-stat-card p-4" data-value="disagree" data-qnum="1">
                        <div class="text-color">
                            <picture>
                                <img class="img-fluid" src='<?php echo base_url();?>{{disagree_img}}' alt="disagree" id="answer">
                            </picture>

                            <!-- <p class="p-2 m-2">{{disagree_desc}}</p> -->
                            <div class="p-2 text-color row mt-2">
                                <div class="col-lg-2 col-xxl-2 col-sm-12 statement-label">반대 :</div>
                                <div class="col-lg-10 col-xxl-10 text-start"><span>{{disagree_desc}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="row mb-3">
                <div class="col-lg-2 text-color text-center fw-bold">관련 영상: </div>
                <div class="col-lg-9">
                    <div class="col-lg-12"><a class="link-secondary" href="{{link1}}}" target="_blank">{{text1}}</a></div>
                    <div class="col-lg-12"><a class="link-secondary" href="{{link2}}}" target="_blank">{{text2}}</a></div>
                    <div class="col-lg-12"><a class="link-secondary" href="{{link3}}}" target="_blank">{{text3}}</a></div>
                </div>
            </div>
        </div>
    </template>
    <div class="row gap-5 justify-content-evenly d-flex flex-row-reverse bd-highlight" id="questCont">
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
<script src="<?php echo base_url("resources/js/question.js")?>"></script>
