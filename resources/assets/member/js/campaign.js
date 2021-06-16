(function ($) {

    let campaignId = 0;
    let campaignName = '';
    let campaignNewsletters = [];
    let campaignLists = [];
    let modal = $('#newslettersModal');
    let modalTitleNode = modal.find('.modal-title');
    let modalNewslettersListContainer = modal.find('.newsletters-list');
    let newslettersList = '';
    let isItemPushedToCampaignLists = false;

    $('.js-show-campaign').on('click', function() {
        campaignId = $(this).data('campaign-id');
        campaignName = $(this).data('campaign-name');
        campaignNewsletters = [];
        campaignLists = [];
        newslettersList = '';

        $.each(window.newsletters, function(index, item) {
        	if (item.campaign_id === campaignId) {
                campaignNewsletters.push(item);
                //newslettersList += '<li>' + item.subject + '</li>';

                isItemPushedToCampaignLists = false;

                $.each(campaignLists, function(index, item2) {
                    if (item.list === item2.listName) {
                        campaignLists[index].newsletters.push(item);
                        isItemPushedToCampaignLists = true;
                    }
                });

                if (!isItemPushedToCampaignLists) campaignLists.push({listName: item.list, newsletters: [item]});
             }
        });

        $.each(campaignLists, function(index, list) {
            newslettersList += '<div class="list-item"><h4 class="list-title">' + list.listName + '</h4>';

            $.each(list.newsletters, function(index, newsletter) {
                newslettersList += '<div class="list-newsletter">' + newsletter.subject + '</div>';
            });

            newslettersList += '</div>';
        });

        modalTitleNode.text(campaignName);
        modalNewslettersListContainer.html(newslettersList);

        modal.modal('show');
    });































})(jQuery);
