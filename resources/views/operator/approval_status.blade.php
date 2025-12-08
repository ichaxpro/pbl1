<!DOCTYPE html>
<html lang="en">

    <div class="page-container">

        <!-- APPROVAL STATUS CARD -->
        <div class="status-card">
            <div class="status-header">
                <img src="{{ asset('images/approval-icon.png') }}" class="status-icon">
                <span>Approval Status</span>
            </div>

            <div class="status-grid">
                @foreach ($stats as $item)
                    <div class="status-box">
                        <p class="label">{{ $item['label'] }}</p>
                        <p class="value">{{ $item['value'] }}</p>
                        <p class="compare">{{ $item['compare'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- SEARCH BAR -->
        <div class="search-wrapper">
            <img src="{{ asset('images/search_icon.png') }}" class="search-icon">
            <input type="text" class="search-input" placeholder="Search...">
        </div>

        <!-- TABLE -->
        <div class="table-wrapper">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Upload Date</th>
                        <th>Notes from Admin</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->type }}</td>
                            <td>{{ $row->upload_date }}</td>
                            <td>{{ $row->notes }}</td>
                            <td>
                                <span class="badge {{ strtolower($row->status) }}">
                                    {{ $row->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach

                    <!-- Empty rows for layout -->
                    @for ($i = 0; $i < 5; $i++)
                        <tr>
                            <td colspan="5">&nbsp;</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        <div class="pagination">
            {{ $data->links('pagination::simple-tailwind') }}
        </div>

    </div>

@endsection

</html>