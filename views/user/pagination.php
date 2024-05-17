
<nav style="margin-left:70%; margin-top:40px" aria-label="Page navigation example">
  <ul class="pagination">
  <li class="page-item"><a class="page-link" href="?page=<?php if ($current_page==1) echo $total_page; else echo $current_page-1?>&searchValue=<?php echo $hint?>">Previous</a></li>

<?php
  for($i=1;$i<=$total_page;$i++){
    if($current_page==$i){
        echo '<li style="font-weight:bold;" class="page-item"><a class="page-link" href="?page='.$i.'&searchValue='.$hint.'"> '.$i.'</a></li>';
    }
   else  echo '<li class="page-item"><a class="page-link" href="?page='.$i.'&searchValue='.$hint.'">'.$i.'</a></li>';

  }
  
?>
<li class="page-item"><a class="page-link" href="?page=<?php if ($current_page==$total_page) echo 1; else echo $current_page+1?>&searchValue=<?php echo $hint?>">Next</a></li>


</ul>
