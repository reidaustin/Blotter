<style>
    .w-25 {
        width: 25% !important;
    }

    .w-50 {
        width: 50% !important;
    }

    .w-75 {
        width: 75% !important;
    }

    .w-100 {
        width: 100% !important;
    }

    .Arial {
        font-weight: bold;
        /* font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif */
    }

    .font-15 {
        font-size: 15px;
    }

    .mb-1 {
        margin-bottom: 0.25rem !important;
    }

    .mb-2 {
        margin-bottom: 0.5rem !important;
    }

    .mb-3 {
        margin-bottom: 1rem !important;
    }

    .mb-4 {
        margin-bottom: 1.5rem !important;
    }

    .mb-5 {
        margin-bottom: 3rem !important;
    }

    .font-10 {
        text-align: justify;
        font-family: arial, sans-serif;

    }

    .main {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .main td,
    th {
        /* border: 1px solid #5b5b5b; */
        /* text-align: start !important; */
        /* padding: 3px; */
        font-size: 13px;

    }

    .bg {
        font-size: 13px;
        border-bottom: 2px black solid;
        /* text-align: center; */
        background-color: #dddddd;
        /* padding: 3px; */
    }
</style>

<table class="w-100" style="margin-top: -45px">
    <tr class="w-100">
        <td class="w-50">
            <h1 class="Arial" style="margin-top:-50px">Daily Blotter</h1>
        </td>
        <td class="w-50">
            <img src="{{ Public_path('./assets/img/pdfimg.PNG') }}" style="height: 100px" />
            <h4 class="font-9" style="margin-left:100px;  margin-top:-93px"> New York Medical Center <br>
                - Department of Public Safety <br>
                -1234 Main Street <br>
                -West Main, New York 11111 <br>
                -987 654 3212 <br /> </h4>
        </td>
    </tr>
    <tr class="w-100">
        <td class="w-50">
            <p class="font-15" style="margin-top:-50px;">Date : @if (!empty($blotter->tour))
                    {{ \Carbon\Carbon::parse($blotter->tour->tour_date)->format('m/d/Y') }}
                @endif
            </p>
        </td>
    </tr>
    <tr class="w-100">
        <td class="w-50">
            <p class="font-15" style="margin-top : -35px;">Tour : @if (!empty($blotter->tour))
                    {{ $blotter->tour->tour_name }}
                @endif
            </p>
        </td>
    </tr>
    <tr class="w-100">
        <td class="w-50">
            <p class="font-15" style="margin-top : -22px;">Tour Commander : @if (!empty($blotter->tour->tour_commander))
                    {{ $blotter->tour->tour_commander->name }}
                @endif
            </p>
        </td>
    </tr>
    <tr class="w-100">
        <td class="w-50">
            <p class="font-15" style="margin-top : -22px;">Supervisor : @if (!empty($blotter->tour->supervisor))
                    {{ $blotter->tour->supervisor->name }}
                @endif
            </p>
        </td>
    </tr>
    <tr class="w-100">
        <td class="w-50">
            <p class="font-15" style="margin-top : -18px;">Vehicles being Used:</p>
        </td>
    </tr>
</table>
<table style="margin-top: -25px">
    <tr class="w-100">
        <td class="w-50">
            <p class="font-15" style="margin-top : -13px;">Weather: @if (!empty($blotter->tour))
                    {{ $blotter->tour->weather }}
                @endif
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </p>
        </td>
        <td class="w-50">
            <p class="font-15">Road Conditions: @if (!empty($blotter->tour))
                    {{ $blotter->tour->road_condition }}
                @endif
            </p>
        </td>
    </tr>
</table>
<table style="margin-top: -20px">
    <tr class="w-100">
        <td class="w-50">
            <input type="checkbox" @if (!empty($blotter->tour) && $blotter->tour->fob_1 == 'Fob 1') checked @endif />
        </td>
        <td class="w-50">
            <span>Fob 1</span>
        </td>
        <td class="w-50">
            <input type="checkbox" @if (!empty($blotter->tour) && $blotter->tour->fob_2 == 'Fob 2') checked @endif />
        </td>
        <td class="w-50">
            <span>Fob 2</span>
        </td>
    </tr>
    <tr class="w-100">
        <td class="w-50">
            <input type="checkbox" @if (!empty($blotter->tour) && $blotter->tour->fob_3 == 'Fob 3') checked @endif />
        </td>
        <td class="w-50">
            <span>Fob 3</span>
        </td>
        <td class="w-50">
            <input type="checkbox" @if (!empty($blotter->tour) && $blotter->tour->fob_4 == 'Fob 4') checked @endif />
        </td>
        <td class="w-50">
            <span>Fob 4</span>
        </td>
    </tr>

</table>
<table>
    <tr class="w-100">
        <td class="w-50" style="margin-top: -30px">
            <p>Other Information: <br>
                @if (!empty($blotter->tour))
                {{ $blotter->tour->comment }}
            @endif</p>
        </td>
    </tr>
</table>
<table style="width:50%">
    <tr>
        <th style="margin-left:400px">
            Reported For Duty
        </th>
    </tr>
</table>
<table class="main" style="width: 60%; border:1px solid #000; margin-left : 130px;">

    <tr class="bg">
        <th style="width: 33%">Patrolman</th>
        <th style="width: 33%">Post</th>
        <th style="width: 33%">Radio</th>
    </tr>

    <tr style="border: 1px solid black">
        <td style="width: 33% ; text-align:center;  border-bottom: 1px solid black">
            @foreach ($tour_officers as $blotter)
                <p style="margin-left: 10%">{{ $blotter->officer->full_name }}</p>
            @endforeach
        </td>

        <td style="width: 33% ; text-align:center;  border-bottom: 1px solid black">
            @foreach ($blotters->tour_post as $blotter)
                <p>{{ $blotter->post }}</p>
            @endforeach
        </td>
        <td style="width: 33% ; text-align:center;  border-bottom: 1px solid black">
            @foreach ($blotters->tour_radio as $blotter)
                <p>{{ $blotter->radio }}</p>
            @endforeach
        </td>
    </tr>
</table>
<br />
<br />
@php
    $month = date('d');
    $day = date('m');
    $year = date('Y');
    $today = $day . '-' . $month . '-' . $year;
@endphp
{{-- <table class="main" style="width: 100%" page-break-inside: auto;>
    <tr class="bg">
        <th>{{ $today }}</th>
        <th></th>
        <th></th>
        <th></th>
        <th>Page 1 of 1</th>
    </tr>
    <thead>

        <tr class="bg">
            <th>Comment</th>
            <th>Entry Number</th>
            <th>Time</th>
            <th>Officer Name</th>
            <th>D.O</th>
        </tr>
    </thead>

    @foreach ($blotter_offi as $blotter)
        <tr style="border-bottom: 1px solid black">

            <td>{{ $blotter->comment }}</td>
            <td>{{ $blotter->entry_number }}</td>
            <td>{{ $blotter->time }}</td>
            <td>{{ $blotter->officers->full_name }}</td>

            @if ($blotter->user_name)
                <td>{{ $blotter->user_name }}</td>
            @else
                <td>Admin</td>
            @endif

        </tr>
    @endforeach


</table> --}}
<table class="main" style="width: 100%">
    <tr class="bg">
        <th style="width : 10%">{{ $today }}</th>
        <th style="width : 60%"></th>
        <th style="width : 10%"></th>
        <th style="width : 7%"></th>
        <th style="width : 13%">Page 1 of 1</th>
    </tr>
    <tr class="bg">
        <th style="width : 10%">Entry Number</th>
        <th style="width : 60% ; "> Comment, Incidents, Police Activity, and Information</th>
        <th style="width : 10%">Time</th>
        <th style="width : 10%">Officers</th>
        <th style="width : 10%">D.O</th>
    </tr>
    @foreach ($blotter_offi as $blotter)
    @endforeach

        <tr style="border-bottom: 1px solid black">

            <td style="width : 10% ; text-align :center;">{{ $blotter->entry_number }}</td>
            <td style="width : 60% ;text-align : center;">{{ $blotter->comment }} &nbsp; </td>
            <td style="width : 10% ; text-align :center;">{{ $blotter->time }}</td>
            @php
                $tag = [];
                $tag = json_decode($blotter->officer_id);
            @endphp
            <td style="width : 10% ; text-align :center;">{{implode(",", $tag) }}</td>

            @if ($blotter->user_name)
                <td style="width : 10% ; text-align :center;">{{ $blotter->user_name }}</td>
            @else
                <td style="width : 10% ; text-align :center;">Admin</td>
            @endif

        </tr>
</table>
<br />
<br />
<table style="margin-left:350px">
    <tr>
        <td>
            Signature Line _________________________________
        </td>
    </tr>
</table>
