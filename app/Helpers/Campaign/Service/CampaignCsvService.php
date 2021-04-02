<?php declare(strict_types=1);

namespace App\Helpers\Campaign\Service;

use App\Helpers\Campaign\Factory\CampaignDTOFactory;
use League\Csv\Reader;

class CampaignCsvService
{
    /** @var CampaignDTOFactory  */
    protected $campaignDTOFactory;

    public function __construct()
    {
        $this->campaignDTOFactory = new CampaignDTOFactory();
    }

    public function parseCsvData(string $filePath)
    {
        $campaignDTOList = [];
        $records = $this->convertCsvToArray($filePath);

        foreach($records as $record) {
            $campaignDTOList[] = $this->campaignDTOFactory->convertToDTO($record);
        }

        return $campaignDTOList;
    }

    protected function convertCsvToArray(string $filePath)
    {
        $csv = Reader::createFromPath($filePath);
        $csv->setHeaderOffset(0);
        $csv->skipEmptyRecords();

        return $csv->getRecords();
    }


}
