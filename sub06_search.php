<!--  리스트  --> 
<div id="listForm_sub">

<div class="search_title">실습지원 가능 치과 리스트</div>

<? 
while($row = $db -> fetch_array($rs)) {
	//경력사항
	$joblevel_arr = explode("|",$row[joblevel]);
	$joblevel_1 = $joblevel_arr[0];
	$joblevel_2 = $joblevel_arr[1];
	$joblevel_3 = $joblevel_arr[2];
	$joblevel_4 = $joblevel_arr[3];
	$joblevel_5 = $joblevel_arr[4];
	$joblevel_6 = $joblevel_arr[5];

	//최종학력
	$haklevel_arr = explode("|",$row[haklevel]);
	$haklevel_1 = $haklevel_arr[0];
	$haklevel_2 = $haklevel_arr[1];

	//공용형태
	$gunmu_arr = explode("|",$row[gunmu]);
	$gunmu_1 = $gunmu_arr[0];
	$gunmu_2 = $gunmu_arr[1];
	$gunmu_3 = $gunmu_arr[2];
	$gunmu_4 = $gunmu_arr[3];

	// 근무요일, 시간
	$worktime_arr = explode("|",$row[worktime]);
	$worktime_1 = $worktime_arr[0];
	$worktime_2 = $worktime_arr[1];

	// 설립연도/직원수/간략소개
	$wr_2_arr = explode("|",$row[wr_2]);
	$wr_2_1 = $wr_2_arr[0];
	$wr_2_2 = $wr_2_arr[1];
	$wr_2_3 = $wr_2_arr[2];

	// 복리후생
	$wr_1_arr = explode("|",$row[wr_1]);
	$wr_1_1 = $wr_1_arr[0];
	$wr_1_2 = $wr_1_arr[1];
	$wr_1_3 = $wr_1_arr[2];
	$wr_1_4 = $wr_1_arr[3];
	$wr_1_5 = $wr_1_arr[4];
	$wr_1_6 = $wr_1_arr[5];
	$wr_1_7 = $wr_1_arr[6];
	$wr_1_8 = $wr_1_arr[7];
	$wr_1_9 = $wr_1_arr[8];
	$wr_1_10 = $wr_1_arr[9];
	$wr_1_11 = $wr_1_arr[10];
	$wr_1_12 = $wr_1_arr[11];
	$wr_1_13 = $wr_1_arr[12];
	$wr_1_14 = $wr_1_arr[13];
	$wr_1_15 = $wr_1_arr[14];
	$wr_1_16 = $wr_1_arr[15];

	// 제출서류
	$wr_3_arr = explode("|",$row[wr_3]);
	$wr_3_1 = $wr_3_arr[0];
	$wr_3_2 = $wr_3_arr[1];
	$wr_3_3 = $wr_3_arr[2];
	$wr_3_4 = $wr_3_arr[3];
	$wr_3_5 = $wr_3_arr[4];

	// 제출방법
	$wr_4_arr = explode("|",$row[wr_4]);
	$wr_4_1 = $wr_4_arr[0];
	$wr_4_2 = $wr_4_arr[1];
	$wr_4_3 = $wr_4_arr[2];



	$scrap_href="/bbs/scrap_popin.php?bo_table=intern&amp;wr_id=$row[wr_id]";

?>
				<!--  치과 리스트  --> 
				<div class="list_b_sub2">
				      <a href="/intern/<?=$row[wr_id]?>">
					  <ul class="list_name">
					        <li><?=$row[wr_name]?></li>
					  </ul>
					  </a>
					  
					  <a href="/intern/<?=$row[wr_id]?>">
					  <ul class="list_detail">
							<li><?=$row[h_addr1]?> > <?=$row[h_addr2]?></li>
					  </ul>
					  </a>
					  <ul class="list_button">
					        <li>
							<a href="<?php echo $scrap_href;  ?>" target="_blank"  onclick="win_scrap(this.href); return false;" class="like2" title="관심치과 등록하기"></a></li>
					  </ul>

<?
if ($member[mb_level]=="2") { // 개인회원만 지원가능합
	
	// 개인회원의 최근이력서 뽑아오기
	$row_resume_gap = sql_fetch(" select wr_id from g5_write_resume where mb_id = '$member[mb_id]' order by wr_datetime desc limit 1 ");

	$goHref = "<a href='/action.php?type=jiwon&intern_wr_id=$row[wr_id]&intern_mb_id=$row[mb_id]&resume_wr_id=$row_resume_gap[wr_id]' onclick='return jiwon()'>";
	$goHref2 = "<a href='/action.php?type=jiwon&intern_wr_id=$row[wr_id]&intern_mb_id=$row[mb_id]&resume_wr_id=$row_resume_gap[wr_id]' onclick='return jiwon()' class='bt01'>";
} else {	
	$goHref = "<a href='#' onclick='guide_alert()'>";
	$goHref2 = "<a href='#' onclick='guide_alert()' class='bt01'>";
}
?>
					  
					 
					  <ul class="list_button2">
							<li><a href="/intern/<?=$row[wr_id]?>">상세보기</a></li>
							<li><!--방금전--><font color='#ff8000'>마감일</font> : <?=$wr_4_1?></li>
							<li><!--채용시까지--><?//=$row[endDay]?><?=$wr_4_1?></li>
					  </ul>
					 
					  
					 

					  
				<div class="details_con">
				<ul>
				  <li class="preview2"><i><span style="cursor:pointer;"><img src="<?php echo G5_THEME_URL?>/img/main/view.png"> 미리보기</span></i></a>
				<ul>
				<div id="panel">
					  <a href="/intern/<?=$row[wr_id]?>"><h4><?=$row[wr_subject]?></h4></a>
					  <ul>
							<li><span>병원명</span> <?=$row[wr_name]?></li>
							<li><span>병의원구분</span> <?=$row[gubun1]?> <?=$row[gubun2]?> <?=$row[gubun3]?> <?=$row[gubun4]?> <?=$row[gubun5]?> <?=$row[gubun6]?></li>
							<li><span>홈페이지</span> <?=$row[wr_homepage]?></li>	
							<li><span>직원수</span> <?=$wr_2_2?>명</li>
							<li><span>대표전화</span> <?=$row[tel]?></li>
					  </ul>
					  <ul>
							<li><span>근무지역</span> <?=$row[h_addr1]?> <?=$row[h_addr2]?> </li>
							<li><span>지원방법</span> <?=$wr_3_1?> &nbsp; <?=$wr_3_2?></li>
							<li><span>공고기간</span> <?=$wr_4_1?> &nbsp; <?=$wr_4_2?></li>
							
					  </ul>

					  <div class="button_3"><?=$goHref2?>즉시지원</a> <a href="/intern/<?=$row[wr_id]?>" class="bt02">상세보기</a> <a href="<?php echo $scrap_href;  ?>" target="_blank" class="bt03" onclick="win_scrap(this.href); return false;">스크랩</a></div>
				</details>
				</div>

				 </ul>
      </li>
    </ul>
  </div>


					  </li>
				</div>
  
				<!--  치과 리스트 끝 --> 
<? } ?>
				

			</div>
			<!--  // 리스트 끝 --> 


			<br>
			<table width=100% align=center>
				<tr>
					<td align=center width=100%>
			<?

				$fun -> page_fun($totalpage, $total, $page, $search, 10);
			?>
					</td>

				</tr>
			</table>

</div>

<script>
$(document).ready(function(e){
  $('.preview2').click(function(){
    $(this).toggleClass('tab');
  });
});
</script>