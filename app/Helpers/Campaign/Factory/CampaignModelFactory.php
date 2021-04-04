<?php declare(strict_types=1);

namespace App\Helpers\Campaign\Factory;

use App\Helpers\Campaign\DTO\NewsletterDTO;
use App\Models\Campaign;

class CampaignModelFactory
{
    public static function convertDTOtoModel(NewsletterDTO $newsletterDTO): Campaign
    {
        $campaign             = new Campaign();
        $campaign->name       = $newsletterDTO->getCampaignName();
        $campaign->company    = $newsletterDTO->getCompanyId();

        return $campaign;
    }
}
