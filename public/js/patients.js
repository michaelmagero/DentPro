<script>
  $(document).ready(function () {
    $('#patients_data').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "{{ url('all-patients') }}",
        "dataType": "json",
        "type": "POST",
        "data": { _token: "{{csrf_token()}}" }
      },
      "columns": [
        { "data": "id" },
        { "data": "title" },
        { "data": "body" },
        { "data": "created_at" },
        { "data": "options" }
      ]

    });
  });
</script>