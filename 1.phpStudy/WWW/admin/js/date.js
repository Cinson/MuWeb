var gdCtrl = new Object();
var goSelectTag = new Array();
var gcGray   = "#808080";
var gcToggle = "#FB8664";
var gcBG = "#e5e6ec";
var previousObject = null;
var gdCurDate = new Date();
var giYear = gdCurDate.getFullYear();
 var giMonth = gdCurDate.getMonth()+1;
 var giDay = gdCurDate.getDate();
var gMonths = new Array("一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月");
with (document) {
var dueyear=2010;//结束年份
write("<Div id='VicPopCal' style='POSITION:absolute;VISIBILITY:hidden;border:0px ridge;z-index:1000;'>");
write("<table border='0' bgcolor='#FFFFCC' style='width:190px;'>");
write("<TR>");
write("<td valign='middle' align='center'><input type='button' name='PrevMonth' value='<' style='height:20;width:20;FONT:bold' onClick='fPrevMonth()'>");
write(" <Select name='tbSelYear' onChange='fUpdateCal(tbSelYear.value, tbSelMonth.value)' Victor='Won'>");
for(i=1991;i<dueyear;i++)
 write("<OPTION value='"+i+"'>"+i+"年</OPTION>");//i=1991为设置的最小年份

write("</Select>");
write(" <select name='tbSelMonth' onChange='fUpdateCal(tbSelYear.value, tbSelMonth.value)' Victor='Won'>");
for (i=0; i<12; i++)
 write("<option value='"+(i+1)+"'>"+gMonths[i]+"</option>");
write("</Select>");
write(" <input type='button' name='PrevMonth' value='>' style='height:20;width:20;FONT:bold' onclick='fNextMonth()'>");
write("</td>");
write("</TR><TR>");
write("<td align='center'>");
write("<DIV style='background-color:#000099'><table width='100%' border='0'>");
fDrawCal(giYear, giMonth, 20, '12');
function fDrawCal(iYear, iMonth, iCellHeight, sDateTextSize) {
  var WeekDay = new Array("日","一","二","三","四","五","六");
  var styleTD = " bgcolor='"+gcBG+"' bordercolor='"+gcBG+"' valign='middle' align='center' height='"+iCellHeight+"' style='font:bold arial "+sDateTextSize+";";
  with (document) {
 write("<tr>");
 for(i=0; i<7; i++){
  write("<td "+styleTD+"color:maroon' >"+ WeekDay[i] + "</td>");
 }
 write("</tr>");
   for (w = 1; w < 7; w++) {
  write("<tr>");
  for (d = 0; d < 7; d++) {
   write("<td id=calCell "+styleTD+"cursor:hand;' onMouseOver='this.bgColor=gcToggle' onMouseOut='this.bgColor=gcBG' onclick='fSetSelected(this)'>");
   write("<font id=cellText Victor='Hcy_Flag'> </font>");
   write("</td>")
  }
  write("</tr>");
 }
  }
}
write("</table></DIV>");
write("</td>");
write("</TR><TR><TD align='center'>");
write("<TABLE width='100%'><TR><TD align='center'>");
write("<B style='cursor:hand' onclick='fSetDate(0,0,0)' onMouseOver='this.style.color=gcToggle' onMouseOut='this.style.color=0'>清除</B>");
write("</td><td algin='center'>");
write("<B style='cursor:hand' onclick='fSetDate(giYear,giMonth,giDay)' onMouseOver='this.style.color=gcToggle' onMouseOut='this.style.color=0'>今天: "+giYear+"-"+giMonth+"-"+giDay+"</B>");
write("</td></tr></table>");
write("</TD></TR>");
write("</TABLE></Div>");
}
function fPopCalendar(popCtrl, dateCtrl){
  if (popCtrl == previousObject){
    if (VicPopCal.style.visibility == "visible"){
    HiddenDiv();
    return true;
   }
  }
  previousObject = popCtrl;
  gdCtrl = dateCtrl;
  fSetYearMon(giYear, giMonth);
  var point = fGetXY(popCtrl);
  with (VicPopCal.style) {
   left = point.x;
 top  = point.y+popCtrl.offsetHeight;
 width = VicPopCal.offsetWidth;
 height = VicPopCal.offsetHeight;
 visibility = 'visible';
  }
}
function HiddenDiv()
{
 var i;
  VicPopCal.style.visibility = "hidden";
}
function fUpdateCal(iYear, iMonth) {
  myMonth = fBuildCal(iYear, iMonth);
  var i = 0;
  for (w = 0; w < 6; w++)
 for (d = 0; d < 7; d++)
  with (cellText[(7*w)+d]) {
   Victor = i++;
   if (myMonth[w+1][d]<0) {
    color = "#999999";
    innerText = -myMonth[w+1][d];
   }else{
    color = ((d==0)||(d==6))?"red":"black";
    innerText = myMonth[w+1][d];
   }
  }
}
function fBuildCal(iYear, iMonth) {
  var aMonth=new Array();
  for(i=1;i<7;i++)
   aMonth[i]=new Array(i);
  var dCalDate=new Date(iYear, iMonth-1, 1);
  var iDayOfFirst=dCalDate.getDay();
  var iDaysInMonth=new Date(iYear, iMonth, 0).getDate();
  var iOffsetLast=new Date(iYear, iMonth-1, 0).getDate()-iDayOfFirst+1;
  var iDate = 1;
  var iNext = 1;
for (d = 0; d < 7; d++) aMonth[1][d] = (d<iDayOfFirst)?-(iOffsetLast+d):iDate++;
for (w = 2; w < 7; w++)
   for (d = 0; d < 7; d++)
  aMonth[w][d] = (iDate<=iDaysInMonth)?iDate++:-(iNext++);
  return aMonth;
}
function fPrevMonth(){
  var iMon = tbSelMonth.value;
  var iYear = tbSelYear.value;
  if (--iMon<1) {
   iMon = 12;
   iYear--;
  }
  fSetYearMon(iYear, iMon);
}
function fNextMonth(){
  var iMon = tbSelMonth.value;
  var iYear = tbSelYear.value;
  if (++iMon>12) {
   iMon = 1;
   iYear++;
 }
  fSetYearMon(iYear, iMon);
}
function fSetYearMon(iYear, iMon){
  tbSelMonth.options[iMon-1].selected = true;
  for (i = 0; i < tbSelYear.length; i++)
 if (tbSelYear.options[i].value == iYear)
  tbSelYear.options[i].selected = true;
  fUpdateCal(iYear, iMon);
}
function fSetDate(iYear, iMonth, iDay){
  VicPopCal.style.visibility = "hidden";
  if ((iYear == 0) && (iMonth == 0) && (iDay == 0)){
   gdCtrl.value = "";
  }else{
   iMonth = iMonth + 100 + "";
   iMonth = iMonth.substring(1);
   iDay   = iDay + 100 + "";
   iDay   = iDay.substring(1);
   if(gdCtrl.tagName == "INPUT"){
      gdCtrl.value = iYear+"-"+iMonth+"-"+iDay;
   }else{
      gdCtrl.innerText = iYear+"-"+iMonth+"-"+iDay;
   }
  }
}
function fSetSelected(aCell){
  var iOffset = 0;
  var iYear = parseInt(tbSelYear.value);
  var iMonth = parseInt(tbSelMonth.value);
  with (aCell.children["cellText"]){
   var iDay = parseInt(innerText);
   if (color==gcGray)
  iOffset = (Victor<10)?-1:1;
 iMonth += iOffset;
 if (iMonth<1) {
  iYear--;
  iMonth = 12;
 }else if (iMonth>12){
  iYear++;
  iMonth = 1;
 }
  }
  fSetDate(iYear, iMonth, iDay);
}
function Point(iX, iY){
 this.x = iX;
 this.y = iY;
}
function fGetXY(aTag){
  var oTmp = aTag;
  var pt = new Point(0,0);
  do {
   pt.x += oTmp.offsetLeft;
   pt.y += oTmp.offsetTop;
   oTmp = oTmp.offsetParent;
  } while(oTmp.tagName!="BODY");
  return pt;
}