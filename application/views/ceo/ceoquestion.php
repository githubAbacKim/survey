<style>
    .scale-div {
        background: rgba(255, 255, 255, 0.33);
        border-radius: 18px;
    }
    .commentCont{
        height: 100vh;
        overflow: auto;
    }
</style>
<div class="container-fluid p-3">
    <template id="commentTemp">
        <div class="h-card-2 card p-3 mt-2 rounded-10">
            <div class="h-card-3">
            {{comment}}
            </div>
        </div>
    </template>    
    <template id="data-template">
        <div class="col-lg-8 col-sm-12 question-card">
            <h5 class="fw-bold mt-4 text-color">{{question}}</h5>
            <!-- question div -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-4">
                    <div class="col-xs-6 col-sm-6 col-lg-12 question-stat-card p-4 " data-value="agree" data-qnum="1">
                        <div class="text-left text-color">
                            <picture>
                                <img class="img-fluid" src='<?php echo base_url();?>{{agree_img}}' alt="agree" id="answer">
                            </picture>
                            <p class="m-2 p-2">{{agree_desc}}</p>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-lg-12 question-stat-card p-4" data-value="disagree" data-qnum="1">
                        <div class="text-left text-color">
                            <picture>
                                <img class="img-fluid" src='<?php echo base_url();?>{{disagree_img}}' alt="disagree" id="answer">
                            </picture>

                            <p class="p-2 m-2">{{disagree_desc}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 gap-3 mt-5 commentCont" id="commentCont{{qnum}}">                
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
<script src="<?php echo base_url("resources/js/ceoquestion.js")?>"></script>
