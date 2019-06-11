<div class="col-md-12">
    <div class="id-card-holder">
        <div class="id-card">
            <table width="500">
                <tr>
                <caption style="background-color: #369EF6;text-align: center; padding-top: .0rem;padding-bottom: .0rem;caption-side: top;">
                    <span style="color:#ffffff;font-size: 24px">Prahi Janhit Foundation</span>
                </caption>
                </tr>
                <tr class="text-left">
                    <td  style="padding:0px 0px 8px 5px; width: 30%;text-align: center;   " >
                        <img src="{{asset('/')}}img/card_logo.jpg" width="110px" height="90px"/><br><br>
                        <span style="color: #2F831A; font-weight: lighter;">D.O.B</span><br>
                        <span style="color: #070808; font-weight: bold;">18/07/1988</span><br>
                        <span style="color: #2F831A; font-weight: lighter;">Date of issue</span><br>
                        <span style="color: #070808; font-weight: bold;">18/07/1988</span>
                    </td>
                    <td style="padding:10px 0px 10px 5px;width: 40%;text-align: center;">
                        <span style="color: #0055AD;font-weight: bold;">Dist. Code</span><span style="color: #0055AD;font-weight: bold;">-021</span><br><br>
                        <span style="color: #070808; font-size: 19px">{{ $user->name }} </span><br>
                        <span style="color: #070808;  font-size: 19px">Supervisor</span><br><br><br>
                        <span style="color: #2F831A; font-weight: lighter;">Gender </span><br>
                        <span style="color: #070808; font-weight: bold;">Male</span><br>
                        <span style="color: #2F831A; font-weight: lighter;">Emp. Code </span><br>
                        <span style="color: #070808; font-weight: bold;">PJF2019002 </span>
                    </td>
                    <td style="padding:10px 0px 10px 5px;width: 30%;text-align: center;">
                        <span style="color: #0055AD;">Regd. No </span><span style="color: #0055AD;font-weight: bold;">PJF20190001 </span><br><br><br>
                        <span>Signature </span><br><br>
                        <span style="color: #2F831A; font-weight: lighter;">Contact No </span><br>
                        <span style="color: #070808;font-weight: bold;">8408835541</span><br>
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
<style>

    .id-card-holder {
        width: 504px;
        padding: 2px;
        margin: 0 auto;
        background-image:  url("../../../img/card_logo.jpg");
        border-radius: 5px;
        position: relative;
        height: 300px;
        background-repeat: no-repeat;
        background-size: 500px 350px;
    }

    .id-card {
        /*background-color: #fff;*/
        padding: 1px;
        border-radius: 1px;
        text-align: center;
        box-shadow: 0 0 1.5px 0px #369EF6;
        color:#fff;
        background:rgba(100,100,100, 0.2);
    }
    .id-card img {
        margin: 0 auto;
    }
</style>