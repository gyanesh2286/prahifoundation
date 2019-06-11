@extends('lap::layouts.auth')

@section('title', 'User')
@section('child-content')
<link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">

<link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet">
<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Noto+Sans&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Merriweather&display=swap');
    *{
        margin: 0;
        padding: 0;
    }

    body{
        font:14px/1.5 'Merriweather', serifl;
        color: #525451;
    }

    .marathi-font{
        font-family: 'Noto Sans', sans-serif;
    }
</style>
<div class="row mb-3">
    <div class="col-md">
        <h2 class="mb-0">@yield('title')</h2>
    </div>
    <div class="col-md-auto mt-2 mt-md-0">
        <!--<input type="button" value="Print Card" id="btnPrint" />-->

        <button type="button" onclick="printJS({printable: 'front_card', type: 'html',style: '.back_card div { color: black; }', header: 'PrintJS - Form Element Selection', showModal: true})">
            Print Form with Header
        </button>
    </div>
</div>
<div class="col-md-12" id="front_card">
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10" >
                <div class="cotnainer" style="margin:0 auto;">
                    <table cellpadding="0" cellspacing="0" width="600">
                        <thead>
                            <tr>
                                <td>
                                    <img src="{{asset('/')}}img/1.jpg" alt="prahi logo" width="600">
                                </td>
                            </tr>
                            <tr>
                                <td style="display:flex; justify-content:center;">
                                    <p style="background: #436ba8; color:#fef210; padding: 0.5rem; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; margin-top: -6px;font-size: 16px;font-weight: bold;">हेल्थ कार्ड</p>
                                </td>
                            </tr>
                        <tbody>
                            <tr>
                                <td style="display:inline-block; width:150px;">
                                    <table>
                                        <tr>
                                            <td>
                                                <div style="border:2px solid #525451; height:200px;width:130px;text-align:center;margin: 0 7px;">
                                                    <small>image</small>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>

                                <td  class="form-table" style="width:440px; display:inline-block;">
                                    <table style="color:#ef1b19;width:100%;">
                                        <tr>
                                            <td style="text-align:right;">
                                                <strong>कोड नंबर</strong><p style=" border-bottom: 2px dotted;display: inline-block;width: 10%;margin: 5px;">001</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>नाव</strong><p style=" border-bottom: 2px dotted;display: inline-block;width: 83%;margin:  5px;">Johm Doe</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>वडील / पतीचे नाव</strong><p style=" border-bottom: 2px dotted; display: inline-block;width: 66%;margin:  5px;">John John John</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>पत्ता</strong><p style=" border-bottom: 2px dotted; display: inline-block;width: 83%;margin: 5px;">amanora park toen, behind amanora mall</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>कार्ड दिनांक</strong><p style=" border-bottom: 2px dotted;display: inline-block;width: 73%;margin: 5px;">11/november/2008</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>मोबाइल नंबर</strong><p style=" border-bottom: 2px dotted;display: inline-block;width:72%;margin: 5px;">9876541235</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>कुटुंब संख्या </strong><p style=" border-bottom: 2px dotted;    display: inline-block;width: 73%;margin: 5px;">05</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="background:#3f539b;padding: 10px;text-align: center;font-size: 12px;">
                                    <p style="color:#f7df1b;">Head Office: C wing 207, New B. J. Market, Jalgaon, Maharashtra <br>
                                        MP Branch Office: Nimad Hospital ke Samne, Manappuram gold ke uppar, 2nd floor. MP
                                    </p>
                                    <p style="color:#fff;font-size: 10px;margin-top: 5px;">Ph: 8623950212 | www.prahifoundation.com | Email - vinodpatil7088@gmail.com | director@prahifoundation.com</p>
                                </td>
                            </tr>
                        </tbody>
                        </thead>
                    </table>
                </div>
            </div> <!-- container ends here -->
        </div> <!-- container ends here -->
    </div> <!-- wrapper ends here -->
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10 back_card" id="wrapper">
                <div class="cotnainer" style="margin:0 auto;">
                    <table cellpadding="0" cellspacing="0" width="600" style="border:1px solid #586985; border-radius:50px;padding: 0 1rem 1rem;">
                        <tr>
                            <td style="display:flex; justify-content:center;">
                                <p style="background: #436ba8; color:#fef210; padding: 0.5rem; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; margin-top: -6px;font-size: 16px;font-weight: bold;">नियम व अटी</p>
                            </td>
                        </tr>

                        <tr style="color:#ef1b19; font-weight:bold;padding:0.8rem 0 0 1rem; display: block;">
                            <td>
                                <span style="color:#403d84;">&#10148;</span> परिवार कार्डची फी मात्र रु 100 आहे.
                            </td>
                        </tr>
                        <tr style="color:#ef1b19; font-weight:bold;padding:0.8rem 0 0 1rem; display: block;">
                            <td>
                                <span style="color:#403d84;">&#10148;</span> हया कार्डचा कालावधी 1 वर्षा पर्यंत असेल.
                            </td>
                        </tr> 
                        <tr style="color:#ef1b19; font-weight:bold;padding:0.8rem 0 0 1rem; display: block;">
                            <td>
                                <span style="color:#403d84;">&#10148;</span> हेल्थ कार्डची सुविधा 1 महिन्यानंतर लागू होईल.
                            </td> 
                        </tr> 
                        <tr style="color:#ef1b19; font-weight:bold;padding:0.8rem 0 0 1rem; display: block;">
                            <td>
                                <span style="color:#403d84;">&#10148;</span> आरोग्य शिबिरात हेल्थ कार्ड, राशन कार्ड, आधार कार्ड दाखवणे बंधन कारक आहे.
                            </td> 
                        </tr>
                        <tr style="color:#ef1b19; font-weight:bold;padding:0.8rem 0 0 1rem; display: block;">
                            <td>
                                <span style="color:#403d84;">&#10148;</span> प्रत्येक गाव / पारेसरात आरोग्य शिबिराचे आयोजन वेळोवेळी करण्यात येईल.
                            </td> 
                        </tr>
                        <tr style="color:#ef1b19; font-weight:bold;padding:0.8rem 0 0 1rem; display: block;">
                            <td>
                                <span style="color:#403d84;">&#10148;</span> सुपरवाइजरची स्वाक्षरी असलेले कार्ड  ग्राह्य असेल.
                            </td> 
                        </tr>
                        <tr style="color:#ef1b19; font-weight:bold;padding:0.8rem 0 0 1rem; display: block;">
                            <td>
                                <span style="color:#403d84;">&#10148;</span> मला या कार्डाचे नियम व अटी पूर्णपणे मान्य आहे.
                            </td> 
                        </tr>

                        <tr>
                            <td>
                                <table width="600" style="text-align: center;">
                                    <tr>
                                        <td>
                                            <div style="width:100px;height:100px;margin: 0 auto;"></div>
                                            <p style="color:#ef1b19; font-weight:bold;">कार्डधारक</p>
                                        </td>

                                        <td>
                                            <div style="width:100px;height:100px;margin: 0 auto;"></div>
                                            <p style="color:#ef1b19; font-weight:bold;">सुपरवाइजर</p>
                                        </td>

                                        <td>
                                            <div style="width:100px;height:100px;margin: 0 auto;"></div>
                                            <p style="color:#ef1b19; font-weight:bold;">संस्था अध्यक्ष</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div> <!-- container ends here -->
        </div> <!-- wrapper ends here -->
    </div>
</div>

<div class="list-group">
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">ID</div>
            <div class="col-md-8">{{ $user->id }}</div>
        </div>
    </div>

    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Name</div>
            <div class="col-md-8">{{ $user->name }}</div>
        </div>
    </div>

    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Email</div>
            <div class="col-md-8">{{ $user->email }}</div>
        </div>
    </div>

    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Timezone</div>
            <div class="col-md-8">
                {{ $user->timezone }}<br>
                <small class="text-secondary">Automatically set when the user logs in.</small>
            </div>
        </div>
    </div>

    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Roles</div>
            <div class="col-md-8">
                {{ $user->roles->sortBy('name')->implode('name', ', ') }}
            </div>
        </div>
    </div>

    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Created At</div>
            <div class="col-md-8">{{ $user->created_at }}</div>
        </div>
    </div>

    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Updated At</div>
            <div class="col-md-8">{{ $user->updated_at }}</div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
@endsection

<!--<script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divFrontContents = $(".front_card").html();
             var divBackContents = $(".back_card").html();
            var printWindow = window.open('', '', 'width=600');
            printWindow.document.write('<html><head><title>Emp Card</title>');
            printWindow.document.write('</head><body style="-webkit-print-color-adjust:exact;">');
            printWindow.document.write(divFrontContents);
            printWindow.document.write('<br>');
            printWindow.document.write(divBackContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
</script>-->