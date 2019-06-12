<div class="print">
    <div style="width: 504px; padding: 2px; margin: 0 auto;  border-radius: 5px;position: relative;height: 300px;background-repeat: no-repeat;background-size: 500px 350px;">
        <div style="padding: 1px; border-radius: 1px; text-align: center; box-shadow: 0 0 1.5px 0px #369EF6;color:#fff;background:rgba(100,100,100, 0.2);">
            <table width="500" cellspacing="0">
                <tr>
                <caption style="background-color: #369EF6;text-align: center; padding-top: .0rem;padding-bottom: .0rem;caption-side: top;">
                    <span style="color:#ffffff;font-size: 24px">Prahi Janhit Foundation</span>
                </caption>
                </tr>
                <tr class="text-left">
                    <td  style="padding:0px 0px 8px 5px; width: 30%;text-align: center;   " >
                        @if($user->media)
                        <img src="{{asset('/')}}images/{{$user->media[0]->filename}}" width="110px" height="90px"/><br><br>
                        @else
                        <img src="{{asset('/')}}img/profile_blank.jpg" width="110px" height="90px"/><br><br>
                        @endif
                        <span style="color: #2F831A; font-weight: lighter;">D.O.B</span><br>
                        <span style="color: #070808; font-weight: bold;">{{ $user->dob }}</span><br>
                        <span style="color: #2F831A; font-weight: lighter;">Date of issue</span><br>
                        <span style="color: #070808; font-weight: bold;">{{ $user->created_at }}</span>
                    </td>
                    <td style="padding:10px 0px 10px 5px;width: 40%;text-align: center;">
                        <span style="color: #0055AD;font-weight: bold;">Dist. Code</span><span style="color: #0055AD;font-weight: bold;">-021</span><br><br>
                        <span style="color: #070808; font-size: 19px;">{{ $user->name }}</span><br>
                        <span style="color: #070808; font-size: 19px;">{{ $user->rolename }}</span><br><br><br>
                        <span style="color: #2F831A; font-weight: lighter;">Gender </span><br>
                        <span style="color: #070808; font-weight: bold;">Male</span><br>
                        <span style="color: #2F831A; font-weight: lighter;">Emp. Code </span><br>
                        <span style="color: #070808; font-weight: bold;">{{ $user->emp_id }} </span>
                    </td>
                    <td style="padding:10px 0px 10px 5px;width: 30%;text-align: center;">
                        <span style="color: #0055AD;">Regd. No </span><span style="color: #0055AD;font-weight: bold;">{!! $user->getGovtRegdNo() !!} </span><br><br><br>
                        <span>Signature </span><br><br>
                        <span style="color: #2F831A; font-weight: lighter;">Contact No </span><br>
                        <span style="color: #070808;font-weight: bold;">{{ $user->mobile_no }}</span><br>
                        <span style="color: #2F831A; font-weight: lighter;">Blood Group </span><br>
                        <span style="color: #070808; font-weight: bold;">o+ </span> 
                    </td>
                </tr>
                <tr style="background-color: #369EF6;">
                    <th></th>
                    <th>
                        <span>prahifoundation.com</span>
                    </th>
                    <th></th>
                </tr>
            </table>
        </div>
    </div>
</div>
<div>
    <input type="button" value="Print Id Card" id="btnPrint" />
</div>
<style>
    @media print {
* {
    -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
    color-adjust: exact !important;  /*Firefox*/
  }
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $(".print").html();
            var printWindow = window.open('', '', 'height=300,width=505');
            printWindow.document.write('<html><head><title>Emp Card</title>');
            printWindow.document.write('</head><body style="-webkit-print-color-adjust:exact;">');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
</script>