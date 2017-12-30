<span class="statistics-text">Users & Pageviews</span>
<table class="uk-table">
    <tr>
        <th>Days</th>
        <th>No. of Users</th>
        <th>No. of Pageviews</th>
    </tr>
    @foreach ($gausers as $key => $item)

    <tr>
        <td>Last {{ $key }} days</td>
        <td>{{ !empty($item[0]['users']) ? $item[0]['users'] : 0 }}</td>
        <td>{{ !empty($item[0]['pageviews']) ? $item[0]['pageviews'] : 0 }}</td>
    </tr>
    @endforeach
</table>