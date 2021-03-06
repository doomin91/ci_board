<script>
            $(document).ready(function() {
                $("#search_btn").click(function() {
                    if ($("#q").val() == '') {
                        alert("검색어를 입력하세요!");
                        return false;
                    } else {
                        var act = "/bbs/board/lists/ci_board/q/" + $("#q").val() + "/page/1";
                        $("#bd_search").attr('action', act).submit();
                    }
                });
            });
 
            function board_search_enter(form) {
                var keycode = window.event.keyCode;
                if (keycode == 13)
                    $("#search_btn").click();
            }
       </script>
<article id="board_area">
    <header>
        <h1></h1>
    </header>
    <h1></h1>

    <div>
        <form id="bd_search" method="post">
            <input type="text" name="search_word" id="q" onkeypress="board_search_enter(document.q);" />
            <input type="button" class="btn btn-secondary" id="search_btn" value="검색"/>
        </form>
    </div>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">번호</th>
                <th scope="col">제목</th>
                <th scope="col">작성자</th>
                <th scope="col">조회수</th>
                <th scope="col">작성일</th>
            </tr>
        </thead>
        <tbody>
            <?php
foreach($list as $lt)
{
           ?>
            <tr>
                <th scope="row"><?php echo $lt -> board_id;?></th>
                <td><a rel="external" href="/bbs/<?php echo $this -> uri -> segment(1); ?>/view/<?php echo $this -> uri -> segment(3); ?>/<?php echo $lt -> board_id; ?>"> <?php echo $lt -> subject;?></a></td>
                <td><?php echo $lt -> user_name;?></td>
                <td><?php echo $lt -> hits;?></td>
                <td>
                <time datetime="<?php echo mdate("%Y-%M-%j", human_to_unix($lt -> reg_date)); ?>">
                    <?php echo mdate("%Y-%M-%j", human_to_unix($lt -> reg_date));?>
                </time></td>
            </tr>
            <?php
            }
           ?>
        </tbody>
    </table>
</article>