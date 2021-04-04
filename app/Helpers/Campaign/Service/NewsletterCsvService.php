<?php declare(strict_types=1);

namespace App\Helpers\Campaign\Service;

use App\Helpers\Campaign\DTO\NewsletterDTO;
use App\Helpers\Campaign\Factory\CampaignModelFactory;
use App\Helpers\Campaign\Factory\NewsletterDTOFactory;
use App\Helpers\Campaign\Factory\NewsletterModelFactory;
use League\Csv\Reader;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class NewsletterCsvService
{
    /** @var NewsletterDTOFactory */
    protected $newsletterDTOFactory;

    public function __construct()
    {
        $this->newsletterDTOFactory = new NewsletterDTOFactory();

    }

    public function parseCsvData(UploadedFile $csv, int $companyId): void
    {
        $newsletterDTOItems = [];
        $records         = $this->convertCsvToArray($csv);

        foreach ( $records as $record ) {
            $newsletterDTOItems[] = $this->newsletterDTOFactory->convertToDTO($record, $companyId);
        }

        $groupedNewsletterDTOList = $this->groupByCampaign($newsletterDTOItems);

        foreach ($groupedNewsletterDTOList as $newsletterDTOList) {
            $campaignId = null;
            foreach ($newsletterDTOList as $i => $newsletterDTO) {
                if ($i === 0) {
                    $campaign = CampaignModelFactory::convertDTOtoModel($newsletterDTO);
                    $campaign->save();

                    $campaignId = $campaign->id;
                }

                $newsletterDTO->setCampaignId($campaignId);

                $newsletter = NewsletterModelFactory::convertDTOtoModel($newsletterDTO);
                $newsletter->save();
            }
        }
    }

    protected function convertCsvToArray(UploadedFile $file)
    {
        $data = $file->getContent();

        $csv = Reader::createFromString($data);
        $csv->setDelimiter(',');
        $csv->setHeaderOffset(0);
        $csv->skipEmptyRecords();

        return iterator_to_array($csv->getRecords());
    }

    /**
     * @param NewsletterDTO[] $newsletterDTOList
     * @return array<int, array<NewsletterDTO>>
     */
    protected function groupByCampaign(array $newsletterDTOList): array
    {
        $groupedNewsletterDTO = [];

        while ( $newsletterDTOList !== [] ) {
            $currentProduct = array_shift($newsletterDTOList);
            $currentGroup   = [$currentProduct];
            foreach ( $newsletterDTOList as $index => $newsletterDTO ) {
                if ( similar_text($newsletterDTO->getCampaignName(), $currentProduct->getCampaignName(), $percentage) && $percentage > 80 ) {
                    $currentGroup[] = $newsletterDTO;
                    unset($newsletterDTOList[$index]);
                }
            }

            $groupedNewsletterDTO[] = $currentGroup;
        }

        return $groupedNewsletterDTO;
    }
}
