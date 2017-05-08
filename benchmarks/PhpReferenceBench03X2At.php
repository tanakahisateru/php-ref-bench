<?php
namespace Acme;

use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use PhpBench\Benchmark\Metadata\Annotations\Warmup;

/**
 * @BeforeMethods({"init"})
 */
class PhpReferenceBench03X2At
{
    protected $bigArray;

    public function init()
    {
        $this->bigArray = range(1, 100000);
    }

    /**
     * @Warmup(10)
     * @Revs(50)
     * @Iterations(5)
     */
    public function benchNoRef()
    {
        $result = PhpReference::x2AtNoRef($this->bigArray, 50000);
        unset($result);
    }

    /**
     * @Warmup(10)
     * @Revs(50)
     * @Iterations(5)
     */
    public function benchRefArg()
    {
        $result = PhpReference::x2AtRefArg($this->bigArray, 50000);
        unset($result);
    }
}
