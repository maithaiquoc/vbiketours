// JavaScript Document
 $(document).ready(function() {             

                $('.ii_dropdown_2wr').live('click', function() {
                    if ($(this).hasClass('ii_dropdown_wr_selected')) {
                        $(this).find('.ii_disclosure_list').fadeOut();
                        $(this).removeClass('ii_dropdown_wr_selected');
                    } else {
                        $('.ii_disclosure_list').fadeOut();
                        $('.ii_dropdown_2wr').removeClass('ii_dropdown_wr_selected');
                        $(this).find('.ii_disclosure_list').fadeIn();
                        $(this).addClass('ii_dropdown_wr_selected');
                    }
                });     

            });        