<style>
    .scale-div {
        border-radius: 2em;
        overflow: auto;
    }

    .scale-div:hover {
        border: solid 2px #F57600;
        cursor: pointer;
    }
</style>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-lg-2 col-xs-12 offset-2  p-5 text-color">
            <a href="<?php echo base_url('survey/') ?>" class="navbar-brand logo">AI 도시를 부탁해!</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-5 header-text-container">
            <p class="header-text mt-3 text-color">문제의 상황 설명과 선택지의 근거를 바탕으로 선택해주세요. 총 9 문항입니다.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-xs-12">
            <div class="p-3 progress-indicator">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>


        </div>
        <div class="col-12 col-xl-4 next-page-indicator text-center mt-3">
            <a href="#" class="previous round text-color" onclick="plusDivs(-1)">&#8249; 이전</a>
            <a href="#" class="next round text-color" onclick="plusDivs(1)">다음 &#8250;</a>
        </div>
    </div>

    <template id="template">
        <div class="col-lg-12 mySlides" id="mySlides">
        <div class="col-lg-6 offset-2 col-xs-12 text-color" >
            <p>{{question}}</p>
        </div>
        <div class="col-lg-6 col-xs-12 p-3 gap-3 offset-3 d-flex flex-row bd-highlight">
            <div class="scale-div col-lg-6" data-value="agree" data-qnum='{{qnum}}'>
                <picture>
                    <source srcset='./../{{agree_img}}' type="image/svg+xml">
                    <img class="img-fluid" src='./../{{agree_img}}' alt="agree" id="answer">
                </picture>

                <div class="card-title-t text-center p-2 text-color">
                    <h5>{{agree_title}}</h5>
                </div>
                <div class="card-body card-height text-color p-3">{{agree_desc}}</div>
            </div>
            <div class="scale-div col-lg-6" data-value="disagree" data-qnum='{{qnum}}'>
                <picture>
                    <source srcset='./../{{disagree_img}}' type="image/svg+xml">
                    <img class="img-fluid" src='./../{{disagree_img}}' alt="disagree" id="answer">
                </picture>
                <div class="card-title-t text-center p-2 text-color">
                    <h5>{{disagree_title}}</h5>
                </div>
                <div class="card-body card-height text-color p-3">
                    {{disagree_desc}}
                </div>
            </div>
        </div>
        </div> 
    </template>
    
    <div class="row mt-5">
        <div id="slideCont"></div>
    </div>
</div>
<script src="./../resources/js/survey.js"></script>