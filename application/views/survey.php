<style>
    /* div{
        border:solid 1px;
    } */
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
    <div class="row top-bar">
        <div class="col-12  col-xl-8 text-color">
            <h3 class="header-logo">AI 도시를 부탁해!</h3>
        </div>

        <div class="col-12  col-xl-5 header-text-container">
            <p class="header-text mt-3 text-color">문제의 상황 설명과 선택지의 근거를 바탕으로 선택해주세요. 총 9 문항입니다.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-8">
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

    <div class="row mt-5">
        <div class="col-lg-6 offset-2 col-xs-12 text-color">
            <p>1. AI 스피커를 통해 가정의 일상 대화를 수집하여 위기 상황시 출동하는 사회 안전망을 만들려고 합니다.
                정확도를 높이기 위해서는 모든 가정에서 AI 스피커를 설치해야합니다. q</p>
        </div>
    </div>

    <div class="row">
        <!-- pagination div -->
        <div class="col-lg-6 col-xs-12 p-3 gap-3 offset-3 d-flex flex-row-reverse bd-highlight mySlides">
            <div class="scale-div col-lg-6" data-value="agree" data-qnum="1">
                <picture>
                    <source srcset="<?php echo base_url('resources/images/question_images/q1/agree.svg') ?>"
                        type="image/svg+xml">
                    <img class="img-fluid" src="<?php echo base_url("resources/images/question_images/q1/agree.svg") ?>"
                        alt="agree" id="answer">
                </picture>

                <div class="card-title-t text-center p-2 text-color">
                    <h5>찬성</h5>
                </div>
                <div class="card-body card-height text-color">
                    노약자나 장애인, 어린이 등 사회 위약층 등에게 안전에 도움이
                    되어 사회 공공에 이익이 됩니다.
                </div>
            </div>
            <div class="scale-div col-lg-6" data-value="disagree" data-qnum="1">
                <picture>
                    <source srcset="<?php echo base_url('resources/images/question_images/q1/disagree.svg') ?>"
                        type="image/svg+xml">
                    <img class="img-fluid"
                        src="<?php echo base_url("resources/images/question_images/q1/disagree.svg") ?>" alt="agree"
                        id="answer">
                </picture>
                <div class="card-title-t text-center p-2 text-color">
                    <h5>찬성</h5>
                </div>
                <div class="card-body card-height text-color">
                    개인의 사생활이 노출될 수 있습니다.
                </div>
            </div>
        </div>
    </div>

</div>



<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var y = document.getElementsByClassName("dot");
        if (n > x.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = x.length }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 1].style.display = "block";
        y[slideIndex - 1].style.background = "red";
    }
</script>
</div>
</div>