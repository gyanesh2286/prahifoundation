@extends('lap::layouts.auth')

@section('title', 'Health Card')
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
        <button type="button" onclick="document.getElementById('blank_div').style.display = 'block'; printJS({printable: 'front_card', type: 'html',maxWidth:1400,style: '.back_card { margin-bottom: 600; }', header: 'Health Card', showModal: true}); document.getElementById('blank_div').style.display = 'none';">
            Print Card
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
                                                    @if($members->media)
                                                        <img src="{{asset('/')}}images/{{$members->media[0]->filename}}" width="160px" height="200px"/><br><br>
                                                    @else
                                                        <img src="{{asset('/')}}img/profile_blank.jpg" width="160px" height="200px"/><br><br>
                                                    @endif
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
                                                <strong>नाव</strong><p style=" border-bottom: 2px dotted;display: inline-block;width: 83%;margin:  5px;">{{ $members->name }}</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>वडील / पतीचे नाव</strong><p style=" border-bottom: 2px dotted; display: inline-block;width: 66%;margin:  5px;">{{ $members->father_husband }}</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>पत्ता</strong><p style=" border-bottom: 2px dotted; display: inline-block;width: 83%;margin: 5px;">{{ $members->current_address }}</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>कार्ड दिनांक</strong><p style=" border-bottom: 2px dotted;display: inline-block;width: 73%;margin: 5px;">{{ $members->date_of_issue }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>मोबाइल नंबर</strong><p style=" border-bottom: 2px dotted;display: inline-block;width:72%;margin: 5px;">{{ $members->card_holder_mobile }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>कुटुंब संख्या </strong><p style=" border-bottom: 2px dotted;    display: inline-block;width: 73%;margin: 5px;">{{ $members->family_members }}</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            
                            <tr>
                                <td style="background-color: #3f539b;padding: 10px;text-align: center;font-size: 12px;">
                                    <p style="color:#f7df1b;">Head Office: {{$members->district->head_office_address}} <br>
                                        Branch Office: {{$members->district->branch_office_address}}
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
    <div id="blank_div" style="height:400px;display: none">
        
    </div>
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
            <div class="col-md-8">{{ $members->id }}</div>
        </div>
    </div>

    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Name</div>
            <div class="col-md-8">{{ $members->name }}</div>
        </div>
    </div>

    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Email</div>
            <div class="col-md-8">{{ $members->email }}</div>
        </div>
    </div>
    
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Father/Husband Name</div>
            <div class="col-md-8">{{ $members->father_husband }}</div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Age</div>
            <div class="col-md-8">{{ $members->age }}</div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Current Address</div>
            <div class="col-md-8">{{ $members->current_address }}</div>
        </div>
    </div><div class="list-group-item">
        <div class="row">
            <div class="col-md-2">District Name</div>
            <div class="col-md-8">{{ $members->district_name  }}</div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">State</div>
            <div class="col-md-8">{{ $members->state }}</div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Date Of Issue </div>
            <div class="col-md-8">{{ $members->date_of_issue }}</div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Gender </div>
            <div class="col-md-8">{{ $members->gender }}</div>
        </div>
    </div><div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Old Disease</div>
            <div class="col-md-8">{{ $members->old_desease }}</div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Aadhaar No</div>
            <div class="col-md-8">{{ $members->uid_aadhaar_no }}</div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Family Members </div>
            <div class="col-md-8">{{ $members->family_members  }}</div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Card Holder Mobile</div>
            <div class="col-md-8">{{ $members->card_holder_mobile }}</div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Health Card Type</div>
            <div class="col-md-8">{{ $members->health_card_type }}</div>
        </div>
    </div>

    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Created At</div>
            <div class="col-md-8">{{ $members->created_at }}</div>
        </div>
    </div>

    <div class="list-group-item">
        <div class="row">
            <div class="col-md-2">Updated At</div>
            <div class="col-md-8">{{ $members->updated_at }}</div>
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