<?php
@header("Content-Type: text/html;charset=utf-8"); //한글 처리.
include ("$DOCUMENT_ROOT/class/config.htm");
include ("$DOCUMENT_ROOT/class/db.class.php");
include ("$DOCUMENT_ROOT/class/db.class.use.php");
include ("$DOCUMENT_ROOT/class/function.class.php");
include ("$DOCUMENT_ROOT/class/javascript.class.php");
include ("$DOCUMENT_ROOT/class/file.class.php");
@mysql_query("set names utf8"); 

$pageNum = "0";
$subNum = "0";
$depth1 = "채용정보";
$depth1 = "지역별 검색";
include_once('../../../common.php');
include_once('../../../_head.php');

$table="g5_write_intern";
$pagesize = "10";
$search = "&part=$part&word=$word&order_type=$order_type&h_addr1=$h_addr1&h_addr2=$h_addr2";

$sql_ .= " and open_ox=1"; // 채용곻개

if ($h_addr1!="") $sql_ .= " and h_addr1='$h_addr1' ";
if ($h_addr2!="") $sql_ .= " and h_addr2='$h_addr2' ";

if($h_addr1_gap!="") $sql_ .=  " and h_addr1='$h_addr1_gap'";

if ($gubun!="") {
	$sql_ .= " and (gubun1='$gubun' or gubun2='$gubun' or gubun3='$gubun' or gubun4='$gubun' or gubun5='$gubun' or gubun6='$gubun' )";
}

if ($gunmu!="") $sql_ .= " and gunmu='gunmu'";

if ($joblevel!="") $sql_ .= " and joblevel='joblevel'";

if ($haklevel!="") $sql_ .= " and INSTR(haklevel,'$haklevel')";

if($word) $sql_ .= " and $part LIKE'%$word%' ";
$where = " where 1 $sql_ order by wr_datetime desc ";
//echo "chk : $where";

list($rs, $total, $totalpage, $j, $page) = $db -> select_list_page($table, $where, $page, $pagesize);


/*
// 지역별카운팅
//서울
$where_all = "open_ox=1";

$h_addr1="서울";
$sql_1 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_1 = sql_query($sql_1);
$count_1 = sql_num_rows($rs_1);

$h_addr1="경기";
$sql_2 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_2 = sql_query($sql_2);
$count_2 = sql_num_rows($rs_2);

$h_addr1="강원";
$sql_3 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_3 = sql_query($sql_3);
$count_3 = sql_num_rows($rs_3);

$h_addr1="경남";
$sql_4 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_4 = sql_query($sql_4);
$count_4 = sql_num_rows($rs_4);

$h_addr1="경북";
$sql_5 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_5 = sql_query($sql_5);
$count_5 = sql_num_rows($rs_5);

$h_addr1="광주";
$sql_6 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_6 = sql_query($sql_6);
$count_6 = sql_num_rows($rs_6);

$h_addr1="대구";
$sql_7 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_7 = sql_query($sql_7);
$count_7 = sql_num_rows($rs_7);

$h_addr1="대전";
$sql_8 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_8 = sql_query($sql_8);
$count_8 = sql_num_rows($rs_8);

$h_addr1="부산";
$sql_9 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_9 = sql_query($sql_9);
$count_9 = sql_num_rows($rs_9);

$h_addr1="울산";
$sql_10 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_10 = sql_query($sql_10);
$count_10 = sql_num_rows($rs_10);

$h_addr1="인천";
$sql_11 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_11 = sql_query($sql_11);
$count_11 = sql_num_rows($rs_11);

$h_addr1="전남";
$sql_12 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_12 = sql_query($sql_12);
$count_12 = sql_num_rows($rs_12);

$h_addr1="전북";
$sql_13 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_13 = sql_query($sql_13);
$count_13 = sql_num_rows($rs_13);

$h_addr1="충남";
$sql_14 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_14 = sql_query($sql_14);
$count_14 = sql_num_rows($rs_14);

$h_addr1="충북";
$sql_15 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_15 = sql_query($sql_15);
$count_15 = sql_num_rows($rs_15);

$h_addr1="제주";
$sql_16 = " select wr_id from $table where $where_all and h_addr1='$h_addr1' ";
$rs_16 = sql_query($sql_16);
$count_16 = sql_num_rows($rs_16);
*/
?>

<script language='javascript'>
	function guide_alert() {
		alert('개인회원만 신청이 가능합니다');
	}

	function jiwon(){
	if (confirm('정말로 지원을 하시겠습니까?') == true) { 
		return true; 
	} else { 
		return false; 
	}
}

</script>	

<? if($h_addr1!="") { // 구 자동선택위해 정의함 ?>
<body onload="item_Search('<?php echo $h_addr1 ?>'); ">
<? } ?>


		<div id="left_area">
			    <?
include_once('../sub/smenu06.php');
?>
		</div>
		<div id="right_area7">

		        <h1>실습 모집 공고</h1> 
				<div class="sub6_bt"><a href="/intern/write">실습 공고 등록</a></div>


<form name=form_ method=post action="<?=$PHP_SELF?>">
<input type=hidden name=order_type value="<?=$order_type?>">

			<!--채용검색-->
			<div class="searchbox">
				<a title="검색조건 접기" class="btn_search_close">검색조건 접기</a>
				<div class="field_wrap">

				<script> 
 function item_Search(Args){
  $('#h_addr2').empty();
  $('#h_addr2').append('<option value="">시/군/구</option>');
  if (Args == "")
   return;
  $.ajax({
   type  : "post",
   async  : false,
   cache  : false,
   data  : {"item1":Args},
   dataType : "xml",
   url   : g5_url+"/ajax.sidomake.php",
   success  : function(xml){
    if ($(xml).find("list").find("item").length > 0) {
     $(xml).find("list").find("item").each(function(i){
      var names  = $(this).find("names").text();
      $('#h_addr2').append('<option value="'+names+'">'+names+'</option>');
     });
     <?php if($h_addr2){ ?>
      $("select[name='h_addr2'] option[value='<?php echo $h_addr2; ?>']").attr('selected','selected');
     <? } ?>
    }
   }
  });

 }
</script>
					<fieldset>
						<legend>키워드 검색</legend>
						<h4>키워드 검색</h4>
						<div class="search-itembox">
							<input type="text" id="sch_keyword" name="sch_keyword" value="<?=$sch_keyword?>" />
						</div>
					</fieldset>
					<fieldset>
						<legend>지역 선택</legend>
						<h4>지역 선택</h4>
						<div class="search-itembox">
							<select name="h_addr1" id="h_addr1" onChange="item_Search(this.value)">
								<option selected value="">시/도</option>
								<?
								$sido_array = array("서울", "경기", "인천", "부산", "대구", "대전", "광주", "세종", "울산", "강원", "경남", "경북", "전남", "전북", "충남", "충북", "제주");
								foreach($sido_array as $key => $value){
								 $sel_chk = "";
								 if($h_addr1 === $value){
								  $sel_chk = "selected";
								 }
								 echo '<option value="'.$value.'" '.$sel_chk.'>'.$value.'</option>';
								}
								?>
						   </select>
						   <select id="h_addr2" name="h_addr2" >
								<option value="">시/군/구</option>
						   </select>
						</div>
					</fieldset>

<?/*?>
					<fieldset id="region">
						<legend>지역 선택</legend>
						<h4>지역 선택</h4>
						<div class="search-itembox">
							<input type="hidden" id="addr" name="addr"/>
							<div class="chk-group">
								<span>
									<input type="radio" id="h_addr1_gap2" name="h_addr1_gap" value="서울" <?if($h_addr1_gap=="서울")echo"checked";?> />
									<label for="h_addr1_gap2">
										서울 <span class="num"><!--(<?=$count_1?>)--></span>
									</label>
								</span>
								<span>
									<input type="radio" id="h_addr1_gap3" name="h_addr1_gap" value="경기" <?if($h_addr1_gap=="경기")echo"checked";?> />
									<label for="h_addr1_gap3">
										경기 <span class="num"><!--(<?=$count_2?>)--></span>
									</label>
								</span>
								<span>
									<input type="radio" id="h_addr1_gap4" name="h_addr1_gap" value="강원" <?if($h_addr1_gap=="강원")echo"checked";?> />
									<label for="h_addr1_gap4">
										강원 <span class="num"><!--(<?=$count_3?>)--></span>
									</label>
								</span>
								<span>
									<input type="radio" id="h_addr1_gap5" name="h_addr1_gap" value="경남" <?if($h_addr1_gap=="경남")echo"checked";?> />
									<label for="h_addr1_gap5">
										경남 <span class="num"><!--(<?=$count_4?>)--></span>
									</label>
								</span>
								<span>
									<input type="radio" id="h_addr1_gap6" name="h_addr1_gap" value="경북" <?if($h_addr1_gap=="경북")echo"checked";?> />
									<label for="h_addr1_gap6">
										경북 <span class="num"><!--(<?=$count_5?>)--></span>
									</label>
								</span>
								<span>
									<input type="radio" id="h_addr1_gap7" name="h_addr1_gap" value="광주" <?if($h_addr1_gap=="광주")echo"checked";?> />
									<label for="h_addr1_gap7">
										광주 <span class="num"><!--(<?=$count_6?>)--></span>
									</label>
								</span>
								<span>
									<input type="radio" id="h_addr1_gap8" name="h_addr1_gap" value="대구" <?if($h_addr1_gap=="대구")echo"checked";?> />
									<label for="h_addr1_gap8">
										대구 <span class="num"><!--(<?=$count_7?>)--></span>
									</label>
								</span>
								<span>
									<input type="radio" id="h_addr1_gap9" name="h_addr1_gap" value="대전" <?if($h_addr1_gap=="대전")echo"checked";?> />
									<label for="h_addr1_gap9">
										대전 <span class="num"><!--(<?=$count_8?>)--></span>
									</label>
								</span>
								<span>
									<input type="radio" id="h_addr1_gap10" name="h_addr1_gap" value="부산" <?if($h_addr1_gap=="부산")echo"checked";?> />
									<label for="h_addr1_gap10">
										부산 <span class="num"><!--(<?=$count_9?>)--></span>
									</label>
								</span>
								<span>
									<input type="radio" id="h_addr1_gap11" name="h_addr1_gap" value="울산" <?if($h_addr1_gap=="울산")echo"checked";?> />
									<label for="h_addr1_gap11">
										울산 <span class="num"><!--(<?=$count_10?>)--></span>
									</label>
								</span>
								<span>
									<input type="radio" id="h_addr1_gap12" name="h_addr1_gap" value="인천" <?if($h_addr1_gap=="인천")echo"checked";?> />
									<label for="h_addr1_gap12">
										인천 <span class="num"><!--(<?=$count_11?>)--></span>
									</label>
								</span>
								<span>
									<input type="radio" id="h_addr1_gap13" name="h_addr1_gap" value="전남" <?if($h_addr1_gap=="전남")echo"checked";?> />
									<label for="h_addr1_gap13">
										전남 <span class="num"><!--(<?=$count_12?>)--></span>
									</label>
								</span>
								<span>
									<input type="radio" id="h_addr1_gap14" name="h_addr1_gap" value="전북" <?if($h_addr1_gap=="전북")echo"checked";?> />
									<label for="h_addr1_gap14">
										전북 <span class="num"><!--(<?=$count_13?>)--></span>
									</label>
								</span>
								<span>
									<input type="radio" id="h_addr1_gap15" name="h_addr1_gap" value="충남" <?if($h_addr1_gap=="충남")echo"checked";?> />
									<label for="h_addr1_gap15">
										충남 <span class="num"><!--(<?=$count_14?>)--></span>
									</label>
								</span>
								<span>
									<input type="radio" id="h_addr1_gap16" name="h_addr1_gap" value="충북" <?if($h_addr1_gap=="충북")echo"checked";?> />
									<label for="h_addr1_gap16">
										충북 <span class="num"><!--(<?=$count_15?>)--></span>
									</label>
								</span>
								<span>
									<input type="radio" id="h_addr1_gap17" name="h_addr1_gap" value="제주" <?if($h_addr1_gap=="제주")echo"checked";?> />
									<label for="h_addr1_gap17">
										제주 <span class="num"><!--(<?=$count_16?>)--></span>
									</label>
								</span>
							</div>
						</div>
					</fieldset>
<?*/?>

					<div class="search_more_box">
					<fieldset>
						<legend>상세검색더보기</legend>
						<ul>
							<li>
								<div class="item_wrap">
									<h4>사업장별</h4>
									<span class="select_wrap">
										<select id="option_sub_type" name="gubun">
	        								<option value="">전체</option>
	        								<option value="종합병원" <?if($gubun=="종합병원")echo"selected";?>>종합병원</option>
	        								<option value="치과병원" <?if($gubun=="치과병원")echo"selected";?>>치과병원</option>
	        								<option value="치과의원" <?if($gubun=="치과의원")echo"selected";?>>치과의원</option>
	        								<option value="치과기공소" <?if($gubun=="치과기공소")echo"selected";?>>치과기공소</option>
	        								<option value="개원예정" <?if($gubun=="개원예정")echo"selected";?>>개원예정</option>
	        								<option value="기타" <?if($gubun=="기타")echo"selected";?>>기타</option>
										</select>
									</span>
								</div>
							</li>
							<li>
								<div class="item_wrap">
									<h4>근무형태</h4>
									<span class="select_wrap">
										<select id="option_sub_duty" name="gunmu">
											<option value="">전체</option>
	        								<option value="정규직" <?if($gunmu=="정규직")echo"selected";?>>정규직</option>
	        								<option value="계약직"  <?if($gunmu=="계약직")echo"selected";?>>계약직</option>
	        								<option value="아르바이트"  <?if($gunmu=="아르바이트")echo"selected";?>>아르바이트</option>
	        								<option value="인턴직"  <?if($gunmu=="인턴직")echo"selected";?>>인턴직</option>
										</select>
									</span>
								</div>
							</li>
						</ul>
						<ul>
							<li>
								<div class="item_wrap">
									<h4>경력</h4>
									<span class="select_wrap">
										<select id="sch_hosp_nm" name="joblevel">
											<option value="">전체</option>
	        								<option value="무관" <?if($joblevel=="무관")echo"selected";?>>무관</option>
	        								<option value="신입" <?if($joblevel=="신입")echo"selected";?>>신입</option>
	        								<option value="1년이상" <?if($joblevel=="1년이상")echo"selected";?>>1년이상</option>
	        								<option value="3년이상" <?if($joblevel=="3년이상")echo"selected";?>>3년이상</option>
	        								<option value="5년이상" <?if($joblevel=="5년이상")echo"selected";?>>5년이상</option>
	        								<option value="10년이상" <?if($joblevel=="10년이상")echo"selected";?>>10년이상</option>
										</select>
									</span>
								</div>
							</li>
							<li>
								<div class="item_wrap">
									<h4>학력</h4>
									<span class="select_wrap">
										<select id="last_schl" name="haklevel">
											<option value="">전체</option>
	        								<option value="무관" <?if($haklevel=="무관")echo"selected";?>>무관</option>
	        								<option value="고등학교" <?if($haklevel=="고등학교")echo"selected";?>>고등학교</option>
	        								<option value="대학(2,3년)" <?if($haklevel=="대학(2,3년)")echo"selected";?>>대학(2,3년)</option>
	        								<option value="대학교" <?if($haklevel=="대학교")echo"selected";?>>대학교</option>
	        								<option value="대학원" <?if($haklevel=="대학원")echo"selected";?>>대학원</option>
										</select>
									</span>
								</div>
							</li>
						</ul>
					</fieldset>
					</div>
					<div class="btn_wrap">
						<a href="#" class="btn_search_more">상세조건 더보기</a>					
						<input type="submit" value="검색" class="btnBig btnMid" id="go_search">
						<a id="go_init" href="/theme/inet/sub/sub01_2.php" class="btnBig gray btnMid">초기화</a> 
						
					</div>

				</div>
			</div>
			<!--//채용검색-->
</form>

<?  //include_once "$DOCUMENT_ROOT/theme/inet/sub/slide.php"; ?>

<?  include_once "$DOCUMENT_ROOT/theme/inet/sub/sub06_search.php"; ?>


    <?
include_once('../../../_tail.php');
?>

<script type="text/javascript">initSideMenu(1,0,1);</script>