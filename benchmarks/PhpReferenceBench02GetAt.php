<?php
namespace Acme;

use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use PhpBench\Benchmark\Metadata\Annotations\Warmup;

/**
 * @BeforeMethods({"init"})
 */
class PhpReferenceBench02GetAt
{
    protected $bigArray;

    public function init()
    {
        $this->bigArray = range(1, 100000);
    }

    /**
     * @Warmup(10)
     * @Revs(100)
     * @Iterations(10)
     */
    public function benchNoRef()
    {
        $result = PhpReference::getAtNoRef($this->bigArray, 50000);
        unset($result);
    }

    /**
     * @Warmup(10)
     * @Revs(100)
     * @Iterations(10)
     */
    public function benchRefArg()
    {
        $result = PhpReference::getAtRefArg($this->bigArray, 50000);
        unset($result);
    }
}
