import tinymce from 'tinymce/tinymce';
import 'tinymce/themes/silver/theme';
import 'tinymce/plugins/paste/plugin';

tinymce.init({
    selector: 'textarea',
    plugins: 'paste',
    // Konfigurasi lainnya
});
