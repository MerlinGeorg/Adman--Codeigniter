<?php



if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once 'vendor/autoload.php';

class Reports extends Layout_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ReportModel/Report');
        $this->load->model('camp/campmodel');
    }

    public function index()
    {
        if (isset($this->session->userdata['logged_in'])) {

            $sdata['username'] = $this->session->userdata('logged_in')['username'];
            $sdata['email'] = $this->session->userdata('logged_in')['email'];
            $sdata['title'] = "Reports";
            $sdata['adv'] = $this->campmodel->getadv();

            $this->data = $sdata;
            $this->page = "reports/view_reports";
            $this->layout();
        } else {
            echo "no";
        }
    }

    public function createReport()

    {
        $this->form_validation->set_rules('report', 'ReportName', 'required');

        if ($this->form_validation->run() == TRUE) {

            $report = $this->input->post('report');

            if ($report == "advertiser") {
                $advId = $this->input->post('ad_name');
                //$result = $this->Report->advertiserReport('invo_reg_line', $advId);
                $result = $this->Report->advertiserReport('invoice_reg', $advId);
                $adv = $this->Report->advertiserName($advId);

                if (empty($result)) {
                    $this->emptyAdvertiserReport($adv->adv_name, $advId);
                } else {
                    foreach ($result as $row) {

                        $est_id[] = $row->est_id;
                    }

                    foreach ($est_id as $item) {

                        $estlineedit[] = $this->Report->get_estline_edit($item);
                    }

                    $key['estlineedit'] = $estlineedit;
                    $key['advertiser'] = $adv;
                    $key['advId'] = $advId;
                    $this->load->view('reports/download_advertiser_report_view', $key);
                }
            } else if ($report == "daily") {

                $date = $this->input->post('date');
                $result = $this->Report->dailyReport('invo_reg_line', $date);

                if (empty($result)) {
                    $this->emptyDailyReport($date);
                } else {

                    foreach ($result as $row) {

                        $est_id[] = $row->est_id;
                    }

                    foreach ($est_id as $item) {

                        $estlineedit[] = $this->Report->get_estline_edit($item);
                    }

                    $key['estlineedit'] = $estlineedit;
                    $key['date'] = $date;

                    $this->load->view('reports/download_daily_report_view', $key);
                }
            } else if ($report == "weekly") {
                $fromDate = $this->input->post('from_date');
                $toDate = $this->input->post('to_date');
                $result = $this->Report->weeklyReport('invo_reg_line', $fromDate, $toDate);

                if (empty($result)) {
                    $this->emptyWeeklyReport($fromDate, $toDate);
                } else {
                    foreach ($result as $row) {

                        $est_id[] = $row->est_id;
                    }

                    foreach ($est_id as $item) {

                        $estlineedit[] = $this->Report->get_estline_edit($item);
                    }

                    $key['estlineedit'] = $estlineedit;
                    $key['fromDate'] = $fromDate;
                    $key['toDate'] = $toDate;

                    $this->load->view('reports/download_weekly_report_view', $key);
                }
            } else if ($report == "monthly") {
                $month_id = $this->input->post('month');
                $result = $this->Report->monthlyReport('invo_reg_line', $month_id);
                $month = date("F", strtotime(date("d-$month_id-y")));

                if (empty($result)) {
                    $this->emptyMonthlyReport($month, $month_id);
                } else {
                    foreach ($result as $row) {

                        $est_id[] = $row->est_id;
                    }

                    foreach ($est_id as $item) {

                        $estlineedit[] = $this->Report->get_estline_edit($item);
                    }

                    $key['estlineedit'] = $estlineedit;
                    $key['month'] = $month;
                    $key['monthId'] = $month_id;

                    $this->load->view('reports/download_month_report_view', $key);
                }
            }
        } else {
            $url = 'reports';
            echo '<script>window.location.href = "' . base_url() . 'index.php?/' . $url . '";</script>';
        }
    }

    public function emptyDailyReport($date)
    {
        $data['date'] = $date;
        $this->load->view('reports/empty_download_report_view', $data);
    }

    public function emptyWeeklyReport($fromDate, $toDate)
    {
        $data['fromDate'] = $fromDate;
        $data['toDate'] = $toDate;
        $this->load->view('reports/empty_download_report_view', $data);
    }

    public function emptyMonthlyReport($month, $month_id)
    {
        $data['month'] = $month;
        $data['monthId'] = $month_id;
        $this->load->view('reports/empty_download_report_view', $data);
    }

    public function emptyAdvertiserReport($advertiser, $advId)
    {
        $data['advertiser'] = $advertiser;
        $data['advId'] = $advId;
        $this->load->view('reports/empty_download_report_view', $data);
    }

    public function downloadReport()
    {

        $report = $this->input->get('report');
        if ($report == "advertiser") {

            $advId = $this->input->get('adv_id');
            $data = $this->advertiser($advId);
            if (!empty($data['estlineedit'])) {
                $content = $this->load->view('reports/advertiser_pdf_view', $data, true);
            } else {
                $content = $this->load->view('reports/empty_pdf_view', $data, true);
            }
        } else if ($report == "daily") {

            $date = $this->input->get('date');
            $data = $this->daily($date);
            if (!empty($data['estlineedit'])) {
                $content = $this->load->view('reports/daily_pdf_view', $data, true);
            } else {
                $content = $this->load->view('reports/empty_pdf_view', $data, true);
            }
        } else if ($report == "weekly") {

            $fromDate = $this->input->get('from_date');
            $toDate = $this->input->get('to_date');
            $data = $this->weekly($fromDate, $toDate);
            if (!empty($data['estlineedit'])) {
                $content = $this->load->view('reports/weekly_pdf_view', $data, true);
            } else {
                $content = $this->load->view('reports/empty_pdf_view', $data, true);
            }
        } else if ($report == "monthly") {

            $month_id = $this->input->get('month');
            $data = $this->monthly($month_id);
            if (!empty($data['estlineedit'])) {
                $content = $this->load->view('reports/monthly_pdf_view', $data, true);
            } else {
                $content = $this->load->view('reports/empty_pdf_view', $data, true);
            }
        }

        $mpdf = new \Mpdf\Mpdf();

        $stylesheet1 = file_get_contents('Assets/css/frm_style.css');
        $stylesheet2 = file_get_contents('Assets/css/pdf.css');

        $mpdf->WriteHTML($stylesheet1, 1);
        $mpdf->WriteHTML($stylesheet2, 1);
        $mpdf->WriteHTML($content);

        $mpdf->Output();
    }
    public function advertiser($advId)
    {
        $result = $this->Report->advertiserReport('invoice_reg', $advId);
        $adv = $this->Report->advertiserName($advId);

        if (empty($result)) {

            $key['advertiser'] = $adv;
        } else {
            foreach ($result as $row) {

                $est_id[] = $row->est_id;
            }

            foreach ($est_id as $item) {

                $estlineedit[] = $this->Report->get_estline_edit($item);
            }

            $key['estlineedit'] = $estlineedit;
            $key['advertiser'] = $adv;
        }
        return $key;
    }

    public function daily($date)
    {
        $result = $this->Report->dailyReport('invo_reg_line', $date);

        if (empty($result)) {
            $key['date'] = $date;
        } else {

            foreach ($result as $row) {

                $est_id[] = $row->est_id;
            }

            foreach ($est_id as $item) {

                $estlineedit[] = $this->Report->get_estline_edit($item);
            }

            $key['estlineedit'] = $estlineedit;
            $key['date'] = $date;
        }
        return $key;
    }

    public function weekly($fromDate, $toDate)
    {

        $result = $this->Report->weeklyReport('invo_reg_line', $fromDate, $toDate);

        if (empty($result)) {
            $key['fromDate'] = $fromDate;
            $key['toDate'] = $toDate;
        } else {
            foreach ($result as $row) {

                $est_id[] = $row->est_id;
            }

            foreach ($est_id as $item) {

                $estlineedit[] = $this->Report->get_estline_edit($item);
            }

            $key['estlineedit'] = $estlineedit;
            $key['fromDate'] = $fromDate;
            $key['toDate'] = $toDate;
        }
        return $key;
    }

    public function monthly($month_id)
    {

        $result = $this->Report->monthlyReport('invo_reg_line', $month_id);
        $month = date("F", strtotime(date("d-$month_id-y")));

        if (empty($result)) {
            $key['month'] = $month;
        } else {
            foreach ($result as $row) {

                $est_id[] = $row->est_id;
            }

            foreach ($est_id as $item) {

                $estlineedit[] = $this->Report->get_estline_edit($item);
            }

            $key['estlineedit'] = $estlineedit;
            $key['month'] = $month;
        }
        return $key;
    }
}
