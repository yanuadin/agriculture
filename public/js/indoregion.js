let Indoregion = {
    init: function () {
        $.ajax({
            url: '/get/province',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $('select[name="province_id"]').empty();
                $('select[name="province_id"]').append(
                    '<option value="" disabled selected>-- Pilih Provinsi --</option>'
                );
                $('select[name="regency_id"]').append(
                    '<option value="" disabled selected>-- Pilih Provinsi Dahulu --</option>'
                );
                $('select[name="district_id"]').append(
                    '<option value="" disabled selected>-- Pilih Kabupaten Dahulu --</option>'
                );
                response.forEach(function (data) {
                    $('select[name="province_id"]').append(
                        '<option value="' + data.id + '">' + data.name + '</option>'
                    );
                });
            }
        });

        $('#province_id').on('change', function () {
            let province = $('#province_id').val();

            $.ajax({
                url: '/get/regency/' + province,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    $('select[name="regency_id"]').empty();
                    $('select[name="regency_id"]').append(
                        '<option value="" disabled selected>-- Pilih Kabupaten --</option>'
                    );
                    response.forEach(function (data) {
                        $('select[name="regency_id"]').append(
                            '<option value="' + data.id + '">' + data.name + '</option>'
                        );
                    });
                }
            });
        });

        $('#regency_id').on('change', function () {
            let regency = $('#regency_id').val();

            $.ajax({
                url: '/get/district/' + regency,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    $('select[name="district_id"]').empty();
                    $('select[name="district_id"]').append(
                        '<option value="" disabled selected>-- Pilih Kecamatan --</option>'
                    );
                    response.forEach(function (data) {
                        $('select[name="district_id"]').append(
                            '<option value="' + data.id + '">' + data.name + '</option>'
                        );
                    });
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Indoregion.init()
});
