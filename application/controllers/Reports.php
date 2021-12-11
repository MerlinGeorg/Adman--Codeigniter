<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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
                $result = $this->Report->advertiserReport('invo_reg_line', $advId);
                $adv=$this->Report->advertiserName($advId);
               
                if (empty($result)) {
                    $this->emptyAdvertiserReport($adv);
                } else {
                    foreach ($result as $row) {

                        $est_id[] = $row->est_id;
                    }
                   
                    foreach ($est_id as $item) {

                        $estlineedit[] = $this->Report->get_estline_edit($item);
                    }
                   
                    $key['estlineedit'] = $estlineedit;
                    $key['advertiser'] = $adv;
                 
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
                    $this->emptyMonthlyReport($month);
                } else {
                    foreach ($result as $row) {

                        $est_id[] = $row->est_id;
                    }
                   
                    foreach ($est_id as $item) {

                        $estlineedit[] = $this->Report->get_estline_edit($item);
                    }
                   
                    $key['estlineedit'] = $estlineedit;
                    $key['month'] = $month;
                 
                    $this->load->view('reports/download_month_report_view', $key);
                }
            }

            //   $this->load->view('reports/test', $data);
        } else {
            $url = 'reports';
            echo '<script>window.location.href = "' . base_url() . 'index.php?/' . $url . '";</script>';
            //    echo '<script type="text/javascript">alert("ReportName Cannot Be Empty");<script>';
            // echo "1";
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

    public function emptyMonthlyReport($month)
    {
        $data['month'] = $month;
        $this->load->view('reports/empty_download_report_view', $data);
    }

    public function emptyAdvertiserReport($advertiser)
    {
        $data['advertiser'] = $advertiser;
        $this->load->view('reports/empty_download_report_view', $data);
    }
}
