<?php

namespace Wxfallstar\LaravelShop\Wap\Member\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the Console command.
     *
     * @var string
     */
    protected $signature = 'wap-member:install';

    /**
     * The Console command description.
     * 命令的名称
     * @var string
     */
    protected $description = '这是wap下的member安装命令';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the Console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $this->call("migrate");
        $this->call("vendor:publish", [
            // 参数表示 => 参数值
            "--provider"=>"Wxfallstar\LaravelShop\Wap\Member\Providers\MemberServiceProvider"
        ]);
    }
}
