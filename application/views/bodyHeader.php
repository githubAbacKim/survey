<style>
    .btnWhite{
        background-color: white;
        border: none;
        color: #F57600;
        transition: 0.4s;
        width: 130px;
        border-radius: 12px;
        font-weight: bolder;
    }
</style>
<header>
    <nav class="navbar navbar-light navbar-expand-lg p-5 nav">
        <div class="container">
            <div class="col-lg-2 col-xs-12 p-3 text-center">
                <div class="col-auto mt-2"><a href="<?php echo site_url('page/') ?>" class="navbar-brand logo">AI 도시를
                        부탁해!</a></div>
            </div>
            <div class="navlist">
                <ul class="nav">      
                    <!-- <li clas="nav-item">
                        <a class="btn btn-secondary btn-sm shadow p-3 btnWhite m-2 redo" id="redo" role="button">다시하기</a>
                    </li>        -->
                    <li clas="nav-item">
                        <a class="btn btn-secondary btn-sm shadow p-3 btn-bg m-2" id="linkhome" href="<?php echo site_url('page/index') ?>" role="button">Home</a>
                    </li>
                    <li clas="nav-item">
                        <a class="btn btn-secondary btn-sm shadow p-3 btn-bg m-2" id="linkvalstat" href="<?php echo site_url('page/valueStatistic') ?>" role="button">가치 통계</a>
                    </li> 
                    <li clas="nav-item">
                        <a class="btn btn-secondary btn-sm shadow p-3 btn-bg m-2" id="linkqstat" href="<?php echo site_url('page/questionStatistics') ?>" role="button">문항 통계</a>
                    </li> 
                    <li clas="nav-item">
                        <a class="btn btn-secondary btn-sm shadow p-3 btn-bg  m-2" id="linkq" href="<?php echo site_url('page/questions') ?>" role="button">문항 보기</a>
                    </li>                         
                    <li clas="nav-item">
                        <a class="btn btn-secondary btn-sm shadow p-3 btn-bg m-2" id="linkabout" href="<?php echo site_url('page/aboutus') ?>" role="button">About</a>
                    </li> 
                </ul>
            </div>
        </div>
    </nav>
</header>