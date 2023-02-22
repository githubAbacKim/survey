<style>
    .btnWhite{
        background-color: white;
        border: none;
        color: #F57600;
        transition: 0.4s;
        width: 130px;
        border-radius: 12px;
    }
</style>
<header>
    <nav class="navbar navbar-light navbar-expand-lg p-5 nav">
        <div class="container-fluid">
            <div class="col-lg-2 col-xs-12 p-3 text-center offset-lg-2">
                <div class="col-auto mt-2"><a href="<?php echo site_url('ceo/') ?>" class="navbar-brand logo">AI 도시를
                        부탁해!</a></div>
            </div>
            <div class="navlist">
                <ul class="nav">         
                    <li clas="nav-item">
                        <a class="btn btn-secondary btn-sm shadow p-2 btn-bg m-2" id="qlink" href="<?php echo site_url('ceo/questions') ?>" role="button">문항 보기</a>
                    </li> 
                    <li clas="nav-item">
                        <a class="btn btn-secondary btn-sm shadow p-2 btn-bg m-2" id="valstatlink" href="<?php echo site_url('ceo/valuestatistic') ?>" role="button">가치 통계</a>
                    </li>
                    <li clas="nav-item">
                        <a class="btn btn-secondary btn-sm shadow p-2 btn-bg m-2" id="qstatlink" href="<?php echo site_url('ceo/questionstatistics') ?>" role="button">문항 통계</a>
                    </li>  
                </ul>
            </div>
        </div>
    </nav>
</header>