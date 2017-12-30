<?php

namespace App\Http\Controllers;

use Auth;
use Config;
use Analytics;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use App\Http\Controllers\Controller;
use abr4xas\nuky\Http\GoogleAnalytics;
use Illuminate\Pagination\LengthAwarePaginator;

class AnalyticsController extends Controller
{

    private function _pagination($analytics)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = collect($analytics);
        $perPage = 30;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        return new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
    }
    
    public function index()
    {
        $periods = [1, 3, 5,  7, 14, 30];
        $gausers= GoogleAnalytics::fetchUsers($periods);
        $this->data['gausers'] = $gausers;

        // fetchTotalVisitorAndPageViews
        $analyticsData_one = Analytics::fetchTotalVisitorsAndPageViews(Period::days(15));
        $this->data['dates'] = $analyticsData_one->pluck('date');
        $this->data['visitors'] = $analyticsData_one->pluck('visitors');
        $this->data['pageViews'] = $analyticsData_one->pluck('pageViews');

        $this->data['browserjson'] = GoogleAnalytics::fetchTopBrowsers();

        $result = GoogleAnalytics::fetchCountry();
        $this->data['country'] = $result->pluck('country');
        $this->data['country_sessions'] = $result->pluck('sessions');

        $this->data['title'] = trans('UIAdmin::googleanalytics.analytics'); 
        return view('UIAdmin::admin.ga.analytics', $this->data);
    }

    public function mobile()
    {
        $this->data['title'] = trans('UIAdmin::googleanalytics.mobile-traffic');
        $this->data['description'] = 'This query returns some information about sessions which occurred from mobile devices. Note that "Mobile Traffic" is defined using the default segment ID -14.';
        $analytics = GoogleAnalytics::fetchMobile(Period::days(7));
        $this->data['entries'] = $this->_pagination($analytics);
        return view('UIAdmin::admin.ga.mobile', $this->data);
    }

    public function newreturningsessions()
    {
        $this->data['title'] = trans('UIAdmin::googleanalytics.returningsessions'); 
        $this->data['description'] = 'This query returns the number of new sessions vs returning sessions.';
        $periods = [1, 3, 5,  7, 14, 30];
        $this->data['analytics'] = GoogleAnalytics::fetchReturning($periods);
        //dd($this->data['analytics']);
        return view('UIAdmin::admin.ga.returning', $this->data);
    }

    public function operatingsystem()
    {
        $this->data['title'] = trans('UIAdmin::googleanalytics.operatingsystem'); 
        $this->data['description'] = 'This query returns a breakdown of sessions by the Operating System, web browser, and browser version used.';
        $analytics = GoogleAnalytics::fetchOperatingSystem(Period::days(7));
        $this->data['entries'] = $this->_pagination($analytics);
        //dd($this->data['analytics']);
        return view('UIAdmin::admin.ga.operatingsystem', $this->data);
    }

    public function traffic()
    {
        $this->data['title'] = trans('UIAdmin::googleanalytics.trafficsources');
        $this->data['description'] = 'This query returns the site usage data broken down by source and medium, sorted by sessions in descending order.';
        $this->data['analytics'] = GoogleAnalytics::fetchTrafficSources(Period::days(7));
    //    dd($this->data['analytics']);
        return view('UIAdmin::admin.ga.traffic', $this->data);
    }

    public function timeonsite()
    {
        $this->data['title'] = trans('UIAdmin::googleanalytics.timeonsite');
        $this->data['description'] = 'This query returns the number of sessions and total time on site and calculated average time on site for the last 7 days.';
        $this->data['analytics'] = GoogleAnalytics::fetchTimeOnSite(Period::days(7));
        //dd($this->data['analytics']);
        return view('UIAdmin::admin.ga.timeonsite', $this->data);
    }

    public function referringsites()
    {
        $this->data['title'] = trans('UIAdmin::googleanalytics.referringsites');
        $this->data['description'] = 'This query returns a list of domains and how many sessions each referred to your site, sorted by pageviews in descending order for the last 30 days.';
        $this->data['analytics'] = GoogleAnalytics::fetchReferringSites(Period::days(30));
        //dd($this->data['analytics']);
        return view('UIAdmin::admin.ga.referringsites', $this->data);
    }

    public function searchengines()
    {
        $this->data['title'] = trans('UIAdmin::googleanalytics.searchengines');
        $this->data['description'] = 'This query returns site usage data for all traffic by search engine, sorted by pageviews in descending order for the last 30 days.';
        $this->data['analytics'] = GoogleAnalytics::fetchSearchEngines(Period::days(30));
        //dd($this->data['analytics']);
        return view('UIAdmin::admin.ga.searchengines', $this->data);
    }

    public function keywords()
    {
        $this->data['title'] = trans('UIAdmin::googleanalytics.keywords');
        $this->data['description'] = 'This query returns sessions broken down by search engine keywords used, sorted by sessions in descending order.';
        $this->data['analytics'] = $analytics = GoogleAnalytics::fetchKeywords(Period::days(30));
        //dd($this->data['analytics']);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = collect($analytics);
        $perPage = 30;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $this->data['entries'] = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
        //dd($this->data['entries']);
        return view('UIAdmin::admin.ga.keywords', $this->data);
    }

    public function topcontent()
    {
        $this->data['title'] = trans('UIAdmin::googleanalytics.topcontent');
        $this->data['description'] = 'This query returns sessions broken down by search engine keywords used, sorted by sessions in descending order for the last 30 days';
        $analytics = GoogleAnalytics::fetchTopcontent(Period::days(30));
        $this->data['entries'] = $this->_pagination($analytics);
        // dd($this->data['analytics']);
        return view('UIAdmin::admin.ga.topcontent', $this->data);
    }

    public function toplandingpages()
    {
        $this->data['title'] = trans('UIAdmin::googleanalytics.toplandingpages');
        $this->data['description'] = 'This query returns your most popular landing pages, sorted by entrances in descending order.';
        $analytics = GoogleAnalytics::fetchTopLandingPages(Period::days(30));
        $this->data['entries'] = $this->_pagination($analytics);
        // dd($this->data['analytics']);
        return view('UIAdmin::admin.ga.toplandingpages', $this->data);
    }

    public function topexitpages()
    {
        $this->data['title'] = trans('UIAdmin::googleanalytics.topexitpages');
        $this->data['description'] = 'This query returns your most common exit pages, sorted by exits in descending order.';
        $analytics = GoogleAnalytics::fetchTopExitPages(Period::days(30));
        // dd($this->data['analytics']);
        $this->data['entries'] = $this->_pagination($analytics);
        return view('UIAdmin::admin.ga.topexitpages', $this->data);
    }
}
