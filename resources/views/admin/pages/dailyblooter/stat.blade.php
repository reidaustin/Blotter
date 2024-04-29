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

    .text-center {
        text-align: center;
    }

    .bold {
        font-weight: bold !important;
    }

    .table1 {
        width: 100%;
        border-collapse: collapse;
        margin-left: -34px;
        border: 1px solid #000
    }

    .table1 tr th {
        /* text-align: left; */
        white-space: nowrap;
        font-size: 10.4px !important;
        border: 1px solid rgb(110, 108, 108);
        padding: 2px;
    }

    .table1 tr td {
        /* text-align: left; */
        white-space: nowrap;
        font-size: 11px !important;
        padding: 2px;
        border: 1px solid rgb(110, 108, 108)
    }

    .width-3 {
        width: 10% !important
    }
</style>
@php
    use Carbon\Carbon;
    $today = Carbon::now('m');
@endphp
<h2 class="text-center bold" style="margin-top: -25px">STATISTICS FROM BLOTTER </h2>
<table class="w-100 table1" style="margin-left: -40px">
    <tr>
        <th style="width : 5%">Totals</th>
        <th style="width : 5%">MDS</th>
        <th style="width : 5%">ESC FL</th>
        <th style="width : 5%">MED</th>
        <th style="width : 5%">REST</th>
        <th style="width : 5%">VIS ISS</th>
        <th style="width : 5%">SP</th>
        <th style="width : 5%">ASSAULT</th>
        <th style="width : 5%">MTA</th>
        <th style="width : 5%">VIS-INJ</th>
        <th style="width : 5%">ARREST</th>
        <th style="width : 5%">HELI</th>
        <th style="width : 5%">CODE RED</th>
        <th style="width : 5%">ELOPE</th>
        <th style="width : 5%">ELEV</th>
        <th style="width : 5%">DISCH PT</th>
        <th style="width : 5%">ENV IN</th>
        <th style="width : 5%">ENV OUT</th>
        <th style="width : 5%">STAT</th>
        <th style="width : 5%">OPT RUN</th>
        <th style="width : 5%">SICK</th>
        <th style="width : 5%">AID LE</th>
        <th style="width : 5%">BERT</th>
        <th style="width : 5%">DISTURB</th>
        <th style="width : 5%">DETOX</th>
        <th style="width : 5%">INJ</th>
        <th style="width : 5%">DOORs</th>
        <th style="width : 5%">10th Fl</th>
    </tr>

    @php
        $month = date('m');
        $day = date('d');
        $year = date('Y');
        $today = $day . '-' . $month . '-' . $year;

        $total_mds_count = 0;
        $total_esc_count = 0;
        $total_med_count = 0;
        $total_rest_count = 0;
        $total_vis_count = 0;
        $total_sp_count = 0;
        $total_assault_count = 0;
        $total_mta_count = 0;
        $total_vis_inj_count = 0;
        $total_arrest_count = 0;
        $total_heli_count = 0;
        $total_code_red_count = 0;
        $total_elope_count = 0;
        $total_elev_count = 0;
        $total_disch_count = 0;
        $total_ev_count = 0;
        $total_evot_count = 0;
        $total_stat_count = 0;
        $total_otp_count = 0;
        $total_sick_count = 0;
        $total_aid_count = 0;
        $total_bert_count = 0;
        $total_distb_count = 0;
        $total_detox_count = 0;
        $total_inj_count = 0;
        $total_door_count = 0;
        $total_fl_count = 0;

    @endphp

    @foreach ($blotter_offi as $key => $blotter_offis)
        @php
            $mds_count = 0;
            $esc_count = 0;
            $med_count = 0;
            $rest_count = 0;
            $vis_count = 0;
            $sp_count = 0;
            $assault_count = 0;
            $mta_count = 0;
            $vis_inj_count = 0;
            $arrest_count = 0;
            $heli_count = 0;
            $code_red_count = 0;
            $elope_count = 0;
            $elev_count = 0;
            $disch_count = 0;
            $ev_count = 0;
            $evot_count = 0;
            $stat_count = 0;
            $otp_count = 0;
            $sick_count = 0;
            $aid_count = 0;
            $bert_count = 0;
            $distb_count = 0;
            $detox_count = 0;
            $inj_count = 0;
            $door_count = 0;
            $fl_count = 0;
        @endphp


        @foreach ($blotter_offis as $blotter)
            @php
                $mds_count = $mds_count + $blotter->mds_count;
                $esc_count = $esc_count + $blotter->esc_count;
                $med_count = $med_count + $blotter->med_count;
                $rest_count = $rest_count + $blotter->rest_count;
                $vis_count = $vis_count + $blotter->vis_count;
                $sp_count = $sp_count + $blotter->sp_count;
                $assault_count = $assault_count + $blotter->assault_count;
                $mta_count = $mta_count + $blotter->mta_count;
                $vis_inj_count = $vis_inj_count + $blotter->vis_inj_count;
                $arrest_count = $arrest_count + $blotter->arrest_count;
                $heli_count = $heli_count + $blotter->heli_count;
                $code_red_count = $code_red_count + $blotter->code_red_count;
                $elope_count = $elope_count + $blotter->elope_count;
                $elev_count = $elev_count + $blotter->elev_count;
                $disch_count = $disch_count + $blotter->disch_count;
                $ev_count = $ev_count + $blotter->ev_count;
                $evot_count = $evot_count + $blotter->evot_count;
                $stat_count = $stat_count + $blotter->stat_count;
                $otp_count = $otp_count + $blotter->otp_count;
                $sick_count = $sick_count + $blotter->sick_count;
                $aid_count = $aid_count + $blotter->aid_count;
                $bert_count = $bert_count + $blotter->bert_count;
                $distb_count = $distb_count + $blotter->distb_count;
                $detox_count = $detox_count + $blotter->detox_count;
                $inj_count = $inj_count + $blotter->inj_count;
                $door_count = $door_count + $blotter->door_count;
                $fl_count = $fl_count + $blotter->fl_count;

                $mds_count_total = $mds_count + $blotter->mds_count;
                $esc_count_total = $esc_count + $blotter->esc_count;
                $med_count_total = $med_count + $blotter->med_count;
                $rest_count_total = $rest_count + $blotter->rest_count;
                $vis_count_total = $vis_count + $blotter->vis_count;
                $sp_count_total = $sp_count + $blotter->sp_count;
                $assault_count_total = $assault_count + $blotter->assault_count;
                $mta_count_total = $mta_count + $blotter->mta_count;
                $vis_inj_count_total = $vis_inj_count + $blotter->vis_inj_count;
                $arrest_count_total = $arrest_count + $blotter->arrest_count;
                $heli_count_total = $heli_count + $blotter->heli_count;
                $code_red_count_total = $code_red_count + $blotter->code_red_count;
                $elope_count_total = $elope_count + $blotter->elope_count;
                $elev_count_total = $elev_count + $blotter->elev_count;
                $disch_count_total = $disch_count + $blotter->disch_count;
                $ev_count_total = $ev_count + $blotter->ev_count;
                $evot_count_total = $evot_count + $blotter->evot_count;
                $stat_count_total = $stat_count + $blotter->stat_count;
                $otp_count_total = $otp_count + $blotter->otp_count;
                $sick_count_total = $sick_count + $blotter->sick_count;
                $aid_count_total = $aid_count + $blotter->aid_count;
                $bert_count_total = $bert_count + $blotter->bert_count;
                $distb_count_total = $distb_count + $blotter->distb_count;
                $detox_count_total = $detox_count + $blotter->detox_count;
                $inj_count_total = $inj_count + $blotter->inj_count;
                $door_count_total = $door_count + $blotter->door_count;
                $fl_count_total = $fl_count + $blotter->fl_count;

            @endphp
        @endforeach
        <tr>
            {{-- <td style="width : 5%">{{ \Carbon\Carbon::parse($key)->format('d/m/Y') }}</td> --}}
            <td style="width : 5%">{{ $blotter->tour_name }}</td>

            <td style="width : 5%">{{ $mds_count }} @php
                $total_mds_count += $mds_count;
            @endphp</td>
            <td style="width : 5%">{{ $esc_count }} @php
                $total_esc_count += $esc_count;
            @endphp</td>
            <td style="width : 5%">{{ $med_count }} @php
                $total_med_count += $med_count;
            @endphp</td>
            <td style="width : 5%">{{ $rest_count }} @php
                $total_rest_count += $rest_count;
            @endphp</td>
            <td style="width : 5%">{{ $vis_count }} @php
                $total_vis_count += $vis_count;
            @endphp</td>
            <td style="width : 5%">{{ $sp_count }} @php
                $total_sp_count += $sp_count;
            @endphp</td>
            <td style="width : 5%">{{ $assault_count }} @php
                $total_assault_count += $assault_count;
            @endphp</td>
            <td style="width : 5%">{{ $mta_count }} @php
                $total_mta_count += $mta_count;
            @endphp</td>
            <td style="width : 5%">{{ $vis_inj_count }} @php
                $total_vis_inj_count += $vis_inj_count;
            @endphp</td>

            <td style="width : 5%">{{ $arrest_count }} @php
                $total_arrest_count += $arrest_count;
            @endphp</td>
            <td style="width : 5%">{{ $heli_count }} @php
                $total_heli_count += $heli_count;
            @endphp</td>
            <td style="width : 5%">{{ $code_red_count }} @php
                $total_code_red_count += $code_red_count;
            @endphp</td>
            <td style="width : 5%">{{ $elope_count }} @php
                $total_elope_count += $elope_count;
            @endphp</td>
            <td style="width : 5%">{{ $elev_count }} @php
                $total_elev_count += $elev_count;
            @endphp</td>
            <td style="width : 5%">{{ $disch_count }} @php
                $total_disch_count += $disch_count;
            @endphp</td>
            <td style="width : 5%">{{ $ev_count }} @php
                $total_ev_count += $ev_count;
            @endphp</td>
            <td style="width : 5%">{{ $evot_count }} @php
                $total_evot_count += $evot_count;
            @endphp</td>
            <td style="width : 5%">{{ $stat_count }} @php
                $total_stat_count += $stat_count;
            @endphp</td>
            <td style="width : 5%">{{ $otp_count }} @php
                $total_otp_count += $otp_count;
            @endphp</td>
            <td style="width : 5%">{{ $sick_count }} @php
                $total_sick_count += $sick_count;
            @endphp</td>
            <td style="width : 5%">{{ $aid_count }} @php
                $total_aid_count += $aid_count;
            @endphp</td>
            <td style="width : 5%">{{ $bert_count }} @php
                $total_bert_count += $bert_count;
            @endphp</td>
            <td style="width : 5%">{{ $distb_count }} @php
                $total_distb_count += $distb_count;
            @endphp</td>
            <td style="width : 5%">{{ $detox_count }} @php
                $total_detox_count += $detox_count;
            @endphp</td>
            <td style="width : 5%">{{ $inj_count }} @php
                $total_inj_count += $inj_count;
            @endphp</td>
            <td style="width : 5%">{{ $door_count }} @php
                $total_door_count += $door_count;
            @endphp</td>
            <td style="width : 5%">{{ $fl_count }} @php
                $total_fl_count += $fl_count;
            @endphp</td>


        </tr>
    @endforeach
    <tr>
        <th style="width : 5%">Total</th>
        <td style="width : 5%">{{ $total_mds_count }}</td>
        <td style="width : 5%">{{ $total_esc_count }}</td>
        <td style="width : 5%">{{ $total_med_count }}</td>
        <td style="width : 5%">{{ $total_rest_count }}</td>
        <td style="width : 5%">{{ $total_vis_count }}</td>
        <td style="width : 5%">{{ $total_sp_count }}</td>
        <td style="width : 5%">{{ $total_assault_count }}</td>
        <td style="width : 5%">{{ $total_mta_count }}</td>
        <td style="width : 5%">{{ $total_vis_inj_count }}</td>
        <td style="width : 5%">{{ $total_arrest_count }}</td>
        <td style="width : 5%">{{ $total_heli_count }}</td>
        <td style="width : 5%">{{ $total_code_red_count }}</td>
        <td style="width : 5%">{{ $total_elope_count }}</td>
        <td style="width : 5%">{{ $total_elev_count }}</td>
        <td style="width : 5%">{{ $total_disch_count }}</td>
        <td style="width : 5%">{{ $total_ev_count }}</td>
        <td style="width : 5%">{{ $total_evot_count }}</td>
        <td style="width : 5%">{{ $total_stat_count }}</td>
        <td style="width : 5%">{{ $total_otp_count }}</td>
        <td style="width : 5%">{{ $total_sick_count }}</td>
        <td style="width : 5%">{{ $total_aid_count }}</td>
        <td style="width : 5%">{{ $total_bert_count }}</td>
        <td style="width : 5%">{{ $total_distb_count }}</td>
        <td style="width : 5%">{{ $total_detox_count }}</td>
        <td style="width : 5%">{{ $total_inj_count }}</td>
        <td style="width : 5%">{{ $total_door_count }}</td>
        <td style="width : 5%">{{ $total_fl_count }}</td>
    </tr>




</table>
