<?php declare(strict_types=1);

namespace App\Helpers\Campaign\Factory;

use App\Helpers\Campaign\DTO\NewsletterDTO;
use App\Models\Newsletter;

class NewsletterModelFactory
{
    public static function convertDTOtoModel(NewsletterDTO $newsletterDTO): Newsletter
    {
        $newsletter                        = new Newsletter();
        $newsletter->campaign_id           = $newsletterDTO->getCampaignId();
        $newsletter->subject               = $newsletterDTO->getSubject();
        $newsletter->variant               = $newsletterDTO->getVariant();
        $newsletter->tags                  = $newsletterDTO->getTags();
        $newsletter->list                  = $newsletterDTO->getList();
        $newsletter->send_date             = $newsletterDTO->getSendDate();
        $newsletter->week_day              = $newsletterDTO->getSendWeekDay();
        $newsletter->total_recipients      = $newsletterDTO->getTotalRecipients();
        $newsletter->unique_placed_orders  = $newsletterDTO->getUniquePlacedOrders();
        $newsletter->placed_order_rate     = $newsletterDTO->getPlacedOrderRate();
        $newsletter->revenue               = $newsletterDTO->getRevenue();
        $newsletter->unique_opens          = $newsletterDTO->getUniqueOpens();
        $newsletter->open_rate             = $newsletterDTO->getOpenRate();
        $newsletter->total_opens           = $newsletterDTO->getTotalOpens();
        $newsletter->unique_clicks         = $newsletterDTO->getUniqueClicks();
        $newsletter->click_rate            = $newsletterDTO->getClickRate();
        $newsletter->total_clicks          = $newsletterDTO->getTotalClicks();
        $newsletter->unsubscribes          = $newsletterDTO->getUnsubscribes();
        $newsletter->spam_complaints       = $newsletterDTO->getSpamComplaints();
        $newsletter->spam_complaints_rate  = $newsletterDTO->getSpamComplaintsRate();
        $newsletter->successful_deliveries = $newsletterDTO->getSuccesfullDeliveries();
        $newsletter->bounces               = $newsletterDTO->getBounces();
        $newsletter->bounce_rate           = $newsletterDTO->getBounceRate();
        $newsletter->campaign_channel      = $newsletterDTO->getCampaignChannel();
        $newsletter->winning               = $newsletterDTO->isWinningVariant();

        return $newsletter;
    }
}
